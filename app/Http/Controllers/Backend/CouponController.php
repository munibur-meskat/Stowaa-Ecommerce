<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\convert_to_sql_date_format;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('backend.coupon.index', compact('coupons'));
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
            'name' => 'required',
            'amount' => 'required|integer',
            'applicable_amount' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Coupon::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'applicable_amount' => $request->applicable_amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return back()->with('success', 'Coupon Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'applicable_amount' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable'
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->name = $request->name;
        $coupon->amount = $request->amount;
        $coupon->applicable_amount = $request->applicable_amount;

        // $coupon->start_date= $request->start_date;
        $coupon->end_date= $request->end_date;

        $coupon->save();
        
        return redirect()->route('dashboard.coupon.index')->with('success', 'Coupon Update Successfull!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return back()->with('warning', "Coupon Delete Successfull!");
    }
}
