<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventory;

class ShopController extends Controller
{
    public function allProducts(){
        $products = Product::select('id','title','slug','discount','price','shot_description','sale_price','image')->orderBy('created_at', 'DESC')->paginate(9);
        

        return view('frontend.shop', compact('products'));
    }

    public function singleProduct($slug){

        // $product = Product::where('slug', $slug)->with(['inventories' => function($q){
        //     $q->with('colors');
        // },'product_galleries'])->firstOrfail();

        // $colors = [];
        // foreach($product->inventories as $pd_color){
        //     $colors[] = $pd_color->color;
        // }
        
        // $product_color = array_unique($colors);

        // return view('frontend.singleshop', compact('product','product_color'));


        $product = Product::with('product_galleries','inventories.colors')->where('slug', $slug)->firstOrfail();

        $colors = $product->inventories->unique('color_id');

        return view('frontend.singleshop', compact('product','colors'));

    }

    public function singleProductSize(Request $request){
        $Inventories = Inventory::with('sizes')->where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();

        $sizes = [];
        foreach($Inventories as $single){
            $sizes[] = $single->sizes;
        }
        
        $options = ['<option data-display="- Please select -" selected disabled>Select Size</option>'];
        foreach ($sizes as $size){
            $options[] = "<option value='$size->id'>". $size->name ."</option>";
        }
                
        return response()->JSON($options);
    }

    public function singleProductOptions(Request $request){
        
        $inventory = Inventory::with('products')->where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first();

        if($inventory->products->sale_price){
            $price = $inventory->products->sale_price + $inventory->additional_price;
            // $total_price = $inventory->products->sale_price + $inventory->additional_price;
        }else{
            $price = $inventory->products->price + $inventory->additional_price;
            // $total_price = $inventory->products->price + $inventory->additional_price;
        }

        $data = [];
        $data['quantity'] = $inventory->quantity;
        $data['additional_price'] = $inventory->additional_price;
        $data['price'] = $price;
        $data['inventory_id'] = $inventory->id;
        // $data['total_price'] = $total_price;

        // return response()->JSON($inventory);

        return response()->JSON($data);

    }
}