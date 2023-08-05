<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $table = 'carts';
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id','id');
    }
}
