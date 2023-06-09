<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model{
    use HasFactory, SoftDeletes;

      /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function invoices(){
      return $this->hasOne(Invoice::class, 'invoice_id');
      
    }

    // public function orderinventories(){
    //   return $this->hasMany(InventoryOrder::class);
    // }
    
}
