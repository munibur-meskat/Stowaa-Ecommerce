<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::with(['user:id,name'])->orderBy('id', 'DESC')->paginate('15');
        return view('backend.category.index', compact('categories'));
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
    public function store(Request $request) {
        
        $category_image = $request->file('photo');

        $request->validate([
            "name"        => "required",
            "parent_id"   => "integer",
            "description" => "max:400|required",
            "photo"       => "image|mimes:jpg,png,jpeg,webp|max:1000|required",
        ]);

        if($category_image->isValid()){

            $image_name = Str::slug(strtolower($request->name)). '-' . time() . '.' .
            $category_image->getClientOriginalExtension();

            Image::make($category_image)->crop(200,256)->save(public_path('storage/categories/') . $image_name, 90);

        }
        
        $insert              = new Category();
        $insert->user_id     = auth()->user()->id;
        $insert->name        = $request->name;
        $insert->slug        = Str::slug($request->name);
        $insert->parent_id   = $request->parent_id;
        $insert->description = $request->description;
        $insert->photo       = $image_name;
        $insert->save();

        return back()->with('success', "Category Insert Successfull!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
