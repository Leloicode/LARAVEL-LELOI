<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLike extends Model
{
    use HasFactory;
    protected $table = 'product_like';
    protected $fillable = ['email','id_product'];
    public function Product()
    {
        return $this->belongsTo(Product::class,'id_product','id');
    }
}
