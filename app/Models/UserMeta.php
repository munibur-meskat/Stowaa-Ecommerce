<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'address',
        'profile_photo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
