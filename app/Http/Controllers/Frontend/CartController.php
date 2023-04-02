<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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

        // foreach($carts as $cart){
        //     if ($cart->inventory->products->sale_price){
        //         $total_price = $cart->inventory->products->sale_price +  $cart->inventory->additional_price;
        //     }
        //     else{
        //         $total_price = $cart->inventory->products->price +  $cart->inventory->additional_price;
        //     }
        // }
        
        return view('frontend.cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        ]);

        return response()->json($cart);
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
}
