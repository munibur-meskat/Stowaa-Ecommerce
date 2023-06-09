<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($product_id) {

        $product = Product::findOrfail($product_id);

        $colors = Color::all();
        // $inventories = Inventory::where('product_id', $product_id)->get();

        return view('backend.inventory.index', compact('product','colors'));

        // compact('inventories')
    }
   
    
 // public function selectSize(Request $request){

    //     $product = Product::with('inventories')->findOrfail($request->id);

    //     $exSizeId = [];

    //     foreach($product->inventories as $product_inv){
    //         if($product_inv->color_id == $request->color_id){
    //             $exSizeId[] = $product_inv->size_id;
    //         }
    //     }

    //     $sizes = Size::whereNotIn('id', $exSizeId)->get();

    //     $options = ["<option selected disabled>Select Size</option>"];
    //     foreach ($sizes as $size){
    //         $options[] = "<option value='$size->id'>". $size->name ."</option>";
    //     }
                
    //     return response()->JSON($options);
    // }


    public function selectSize(Request $request) {

        $inventories = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();

        $sizes_id = $inventories->pluck('size_id')->toArray();

        $sizes = Size::whereNotIn('id', $sizes_id)->get();

        $options = ["<option selected disabled>Select Size</option>"];
        foreach ($sizes as $size){
            $options[] = "<option value='$size->id'>". $size->name ."</option>";
        }
                
        return response()->JSON($options);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'product_id' => 'required|integer',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required',
            'additional_price' => 'nullable|integer',
        ]);

        Inventory::create([
            'product_id' => $request->product_id,
            'color_id'   => $request->color,
            'size_id'    => $request->size,
            'quantity'   => $request->quantity,
            'additional_price' => $request->additional_price,
        ]);
        
        return back()->with("success", "Inventory Added Successfull!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit( $id) {
        $product = Product::findOrFail($id);

        $inventory = Inventory::findOrFail($id);
        return view('backend.inventory.edit', compact('inventory', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'title' => 'nullable',
            'quantity' => 'required',
            'additional_price' => 'nullable',
        ]);

        $inventory->products->title = $request->title;

        $inventory->quantity = $request->quantity;
        $inventory->additional_price = $request->additional_price;
        $inventory->save();

        return redirect()->route('dashboard.inventory.index', $inventory->products->id)->with('success', 'Inventory Updated Successfull!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
