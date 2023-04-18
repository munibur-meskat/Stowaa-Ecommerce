<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOrder extends Model
{
    use HasFactory;

      /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // public function inventories(){ 
    //     return $this->hasMany(Inventory::class, 'inventory_id');
    // }
}
