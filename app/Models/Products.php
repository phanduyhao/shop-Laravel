<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'Products';
    public function cate()
    {
        return $this->belongsTo(cate::class, 'cate_id','id');
    }
}
