<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingCondition;
use Illuminate\Http\Request;

class ShippingConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping_conditions = ShippingCondition::orderBy('id','desc')->get();
        return view('backend.shipping_condition.index', compact('shipping_conditions'));
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
            'location' => 'required',
            'amount' => 'required|integer',
           
        ]);

        ShippingCondition::create([
            'location' => $request->location,
            'shipping_amount' => $request->amount,
           
        ]);
        return back()->with('success', 'Shipping Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingCondition  $shippingCondition
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingCondition $shippingCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingCondition  $shippingCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingCondition $shippingCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingCondition  $shippingCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingCondition $shippingCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingCondition  $shippingCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $shippingCondition = ShippingCondition::find($id);
        $shippingCondition->delete();
        return back()->with('warning', "Shipping Delete Successfull!");
    }
}
