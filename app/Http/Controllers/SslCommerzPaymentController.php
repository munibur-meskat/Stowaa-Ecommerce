<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\UserInfo;
use App\Models\Inventory;
use App\Mail\InvoiceOrder;
use Illuminate\Http\Request;
use App\Models\InventoryOrder;
use App\Models\ShippingAddress;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Session;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller {

    public function index(Request $request) {
        // return $request;
        // return $request->ship_to_different_address;

        $request->validate([
            "billing_name" => "required",
            "billing_address_1" => "required",
        ]);

      UserInfo::updateOrCreate([
            'user_id' => auth()->user()->id,
        ], [
            'user_id' => auth()->user()->id,
            'phone' => $request->billing_phone,
            'address' => $request->billing_address_1,
            'city' => $request->billing_city,
            'zip' => $request->postcode,
        ]);

        // Cart information
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $sub_total = 0;

        foreach($carts as $cart){

            if($cart->quantity > $cart->inventories->quantity){
                return back()->with('error', $cart->inventories->products->title .'- Stock Out!');
            }else {
                $price = (($cart->inventories->products->sale_price ?? $cart->inventories->products->price) + ($cart->inventories->additional_price ?? 0)) * $cart->quantity;

                $sub_total += $price;
            }
        }

        $sub_total;
        $grand_total = ($sub_total - (Session::has('coupon') ? Session::get('coupon')['amount'] : 0)) + (Session::has('shipping_charge') ? Session::get('shipping_charge')  : 0);
       
        // return $grand_total;
        // return back()->with('success', 'Insert Successfull!');

        $post_data = array();
        $post_data['total_amount'] = $grand_total;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid();

            // Order table data insert
            $insert_order = Order::create([
                'user_id' => auth()->user()->id,
                'total' => $post_data['total_amount'],
                'transaction_id' => $post_data['tran_id'],
                'coupon_name' => Session::get('coupon')['name'] ?? null,
                'coupon_amount' =>  Session::get('coupon')['amount'] ?? null,
                'shipping_charge' => Session::get('shipping_charge'),
                'order_status' => 'Pending',
                'payment_status' => 'Unpaid',
                'order_note' => $request->order_note,
    
            ]);
    
            if($insert_order){
                foreach($carts as $cart){
                    InventoryOrder::create([
                        'inventory_id' => $cart->inventory_id,
                        'order_id' => $insert_order->id,
                        'quantity' => $cart->quantity,
                        'amount' => $cart->inventories->products->sale_price ?? $cart->inventories->products->price,
                        'additional_amount' => $cart->inventories->additional_price ?? null,
                    ]);
                }
            }
    
            if($request->ship_to_different_address && $insert_order){
                $request->validate([
                    'shipping_name' => 'required',
                    'shipping_phone' => 'required',
                    'shipping_address' => 'required',
                    'shipping_city' => 'required',
                    // 'shipping_postcode' => 'required',
                    
                ]);
    
                ShippingAddress::create([
                    'order_id' => $insert_order->id,
                    'name' => $request->shipping_name,
                    'phone' => $request->shipping_phone,
                    'address' => $request->shipping_address,
                    'city' => $request->shipping_city,
                    'zip' => $request->shipping_postcode,
                ]);
                                    
            }

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = auth()->user()->name;
        $post_data['cus_email'] = auth()->user()->email;
        $post_data['cus_add1'] = auth()->user()->user_info->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = auth()->user()->user_info->city ?? '';
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = auth()->user()->user_info->zip ?? ' ';
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = auth()->user()->user_info->phone ?? '';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

        return back()->with('success', 'Insert Successfull!');

    }

    public function success(Request $request) {

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');

        $sslc = new SslCommerzNotification();

        $order_details = Order::where('transaction_id', $tran_id)->select('id', 'total', 'transaction_id', 'coupon_name', 'coupon_amount', 'shipping_charge','order_status', 'payment_status', 'created_at')->first();

        $orderInventories = InventoryOrder::where('order_id', $order_details->id)->get();

        // return $order_details;

        // return $order_details;

        // return $orderInventories;

        if ($order_details->order_status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount);

            if ($validation) {

               $order_details->update([
                'order_status' => 'Processing',
                'payment_status' => 'Paid',
               ]);

               foreach($orderInventories as $orderInventory){
                Inventory::where('id', $orderInventory->inventory_id)->decrement('quantity', $orderInventory->quantity);
                Cart::where('inventory_id', $orderInventory->inventory_id)->where('user_id', auth()->user()->id)->delete();
               }

               $request->session()->forget(['coupon','shipping_charge']);
               
               $pdf = Pdf::loadView('invoice.order-invoice', compact('order_details','orderInventories'));

               $pdf->save( public_path('storage/invoice/' . $order_details->id . "_invoice.pdf" ));

               $pdf_path = url('/') . '/storage/invoice/' . $order_details->id . "_invoice.pdf";

               Invoice::create([
                'order_id'     => $order_details->id,
                'invoice_path' => $pdf_path,
                'invoice'      => $order_details->id . "_invoice.pdf",

               ]);
               
            //    Mail::to( auth()->user()->email)->send(new InvoiceOrder( $order_details ));

               return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Successfull');

            }
        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {
            return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Successfull');
        } else {
            return back()->with('error', 'Invalid Transaction');
        }

    }

    public function fail(Request $request) {
        $tran_id = $request->input('tran_id');

        $order_details = Order::where('transaction_id', $tran_id)->select('id','transaction_id', 'order_status', 'total', 'payment_status')->first();

        if ($order_details->order_status == 'Pending') {

               $order_details->update([
                'order_status' => 'Failed',
                'payment_status' => 'Unpaid',
               ]);

               $request->session()->forget(['coupon','shipping_charge']);
               
               return redirect()->route('frontend.shop.allproduct')->with('error', 'Transaction is Failed');
        
        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {
            return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Successfull');
        } else {
            return back()->with('error', 'Invalid Transaction');
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = Order::where('transaction_id', $tran_id)->select('id','transaction_id', 'order_status', 'total', 'payment_status')->first();

        if ($order_details->order_status == 'Pending') {
            $order_details->update([
                'order_status' => 'Canceled',
               ]);
            echo "Transaction is Cancel";

            $order_details = Order::where('transaction_id', $tran_id)->first();

            InventoryOrder::where('order_id', $order_details->id)->delete();
            $order_details->delete();

            $request->session()->forget(['coupon','shipping_charge']);
               
            return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Cancel');

        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {

            return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Successfull');
        } else {
            
            return back()->with('error', 'Invalid Transaction');
        }


    }

    public function ipn(Request $request) {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) {

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');

        $sslc = new SslCommerzNotification();

        $order_details = Order::where('transaction_id', $tran_id)->select('id','transaction_id', 'order_status', 'total', 'payment_status')->first();

        $orderInventories = InventoryOrder::where('order_id', $order_details->id)->get();

        if ($order_details->order_status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount);

            if ($validation == TRUE) {

               $order_details->update([
                'order_status' => 'Processing',
                'payment_status' => 'Paid',
               ]);

               foreach($orderInventories as $orderInventory){
                Inventory::where('id', $orderInventory->inventory_id)->decrement('quantity', $orderInventory->quantity);
                Cart::where('inventory_id', $orderInventory->inventory_id)->where('user_id', auth()->user()->id )->delete();
               }

               $request->session()->forget(['coupon','shipping_charge']);
               
               return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Successfull');

            }
        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {
            return redirect()->route('frontend.shop.allproduct')->with('success', 'Transaction is Successfull');
        } else {
            return back()->with('error', 'Invalid Transaction');
        }

            //   ============

            // if ($order_details->status == 'Pending') {
            //     $sslc = new SslCommerzNotification();
                
            //     $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, 

            //     $order_details->currency);
            //     if ($validation == TRUE) {
                    
            //         $update_product = DB::table('orders')
            //             ->where('transaction_id', $tran_id)
            //             ->update(['status' => 'Processing']);

            //         echo "Transaction is successfully Completed";
            //     }
            // } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

            //     #That means Order status already updated. No need to udate database.

            //     echo "Transaction is already successfully Completed";
            // } else {
            //     #That means something wrong happened. You can redirect customer to your product page.

            //     echo "Invalid Transaction";
            // }

        } else {
            echo "Invalid Data";
        }
    }

}
