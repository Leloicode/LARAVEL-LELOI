<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;
    protected $table='type_products';
    protected $fillable =['name','description','image'];
    public function products(){
        return $this->hasMany(Product::class,'id_type','id');
     }
    
}
