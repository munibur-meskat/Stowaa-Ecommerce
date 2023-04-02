<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductGallery;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Foreach_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products = Product::with(['user:id,name','categories:id,name,slug'])->select('id','title','user_id','image','price','sale_price','discount')->orderBy('id', 'DESC')->paginate('15');
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_image = $request->image;
        $product_gallery = $request->gallery;

        $request->validate([
            'title'=> 'required',
            'price'=> 'required|integer',
            'category'=> 'required',
            'sale_price'=> 'required|integer',
            'discount'=> 'nullable|integer',
            'image'=> 'required|image|max:500|mimes:png,jpg,jpeg',
            'gallery.*'=> 'nullable|image|max:500|mimes:png,jpg,jpeg',
            'shot_description'=> 'required|max:300',
            'description'=> 'nullable|max:1200',
            'addtional_info'=> 'nullable|max:5000',
        ]);

        if($product_image->isValid()){
            $image_name = Str::slug(strtolower($request->title)). '-' . time() . '.' . $product_image->getClientOriginalExtension();

            Image::make($product_image)->crop(480,480)->save(public_path('storage/products/') . $image_name, 90);

        } 

        $product = new Product();
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->user_id = auth()->user()->id;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->discount = $request->discount;
        $product->shot_description = $request->shot_description;
        $product->description = $request->description;
        $product->addtional_info = $request->addtional_info;
        $product->image = $image_name;
        $product->save();
        
        $product->categories()->attach($request->category);

        if($product_gallery){
            foreach($product_gallery as $img){
                $img_name = Str::slug(strtolower($request->title)). '-' . uniqid() . '.' . $img->getClientOriginalExtension();
                
                Image::make($img)->crop(480,480)->save(public_path('storage/products_gallery/') . $img_name, 90);

                ProductGallery::create([
                    "product_id" => $product->id,
                    "image" => $img_name,
                ]);
            }
        }

        return back()->with('success', 'Product Add Successfull!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('danger', "Product Delete Successfull!");
    }
}
