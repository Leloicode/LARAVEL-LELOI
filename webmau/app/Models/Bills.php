<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = ['id_customer','date_order','total','payment','note','status'];
    public function Customer()
    {
        return $this->belongsTo(Customer::class,'id_customer','id');
    }
    
}
