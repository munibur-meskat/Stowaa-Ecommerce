<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){

        if($request->all() ){
            $orders = Order::where('id', 'LIKE', "%$request->order_id%")->orderBy('id', 'desc')->select(['id','total','order_status','payment_status','created_at'])->paginate('10')->withQueryString();
        }else{
            $orders = Order::orderBy('id', 'desc')->select(['id','total','order_status','payment_status','created_at'])->paginate('10');
        }
        return view('backend.order.index', compact('orders'));
    }
}
