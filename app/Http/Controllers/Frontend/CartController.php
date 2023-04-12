<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use App\Http\Controllers\Controller;
use App\Models\ShippingCondition;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with('inventories')->where('user_id', auth()->user()->id)->get();
        $shipping_conditions = ShippingCondition::get();

        // foreach($carts as $cart){
        //     if ($cart->inventory->products->sale_price){
        //         $total_price = $cart->inventory->products->sale_price +  $cart->inventory->additional_price;
        //     }
        //     else{
        //         $total_price = $cart->inventory->products->price +  $cart->inventory->additional_price;
        //     }
        // }
        
        return view('frontend.cart.index', compact('carts', 'shipping_conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required',
            'quantity' => 'required',
        ]);

        Cart::create([
            'user_id' =>auth()->user()->id,
            'inventory_id' => $request->inventory_id,
            'quantity' => $request->quantity,
            'cart_total' => $request->total,
        ]);

        return redirect()->route('frontend.cart.index')->with('success', 'Add To Cart Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cart = Cart::where('user_id', $request->user_id)->where('id', $request->cart_id)->first();

        $cart->update([
            'quantity' => $request->quantity,
            'cart_total' => $request->total,
        ]);

        $cart_total = Cart::where('user_id', auth()->user()->id)->sum('cart_total');
        $grand_total = $cart_total - (Session::get('coupon')['amount'] ?? 0);

        $cart_data = [
            'cart_total' => $cart_total,
            'grand_total' => $grand_total,
        ];

        return response()->json($cart_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('warning', 'Cart Delete Successfull!');
    }

    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('name', $request->coupon)->first();
        $cart_total = Cart::where('user_id', auth()->user()->id)->sum('cart_total');

        if($coupon->start_date < now()){

            if( $cart_total > $coupon->applicable_amount){

                if($coupon->end_date > now()){
                    $couponApply = [
                        'name' => $coupon->name,
                        'amount' => $coupon->amount,
                    ];

                    Session::put('coupon', $couponApply);
                    return back();

                } else{
                    return back()->with('error', 'Date Expaire!');
                }
            } else{
                return back()->with('error', 'Cart Amount Low!');
            }
        } else{
            return back()->with('error', 'Invalid Coupon!');
        }

        // return back()->with('warning', 'Cart Delete Successfull!');
    }

    public function  shippingApply(Request $request)
    {
        $data = ShippingCondition::where('id', $request->shipping_id)->first();

        $cart_total = Cart::where('user_id', auth()->user()->id)->sum('cart_total');
        $grand_total = ($cart_total - (Session::get('coupon')['amount'] ?? 0)) + $data->shipping_amount;

        $data_shipping = [
            'shipping_amount' => $data->shipping_amount,
            'grand_total' => $grand_total,
        ];
        
        return response()->json($data_shipping);
    }

    public function checkoutOrder() {
        return view('frontend.cart.checkout');
    }
}
