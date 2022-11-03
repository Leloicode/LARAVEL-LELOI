<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','id_type','description','unit_price','promotion_price','image','unit','new'];
    public function type_product()
    {
        return $this->belongsTo(TypeProduct::class,'id_type','id');
    }
    public function productLike()
    {
        return $this->hasMany(ProductLike::class,'id_product','id');
    }
}
