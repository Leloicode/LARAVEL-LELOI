<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_detail';
    protected $fillable = ['id_bill','id_product','quantity','unit_price'];
    public function bills()
    {
        return $this->belongsTo(Customer::class,'id_bill','id');
    }
    
    public function Product()
    {
        return $this->belongsTo(Product::class,'id_product','id');
    }
}
