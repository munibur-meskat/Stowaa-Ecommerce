<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

    function colors(){
        return $this->belongsTo(Color::class,'color_id');
    }

    function sizes(){
        return $this->belongsTo(Size::class, 'size_id');
    }


}
