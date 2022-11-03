<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['name','gender','email','address','phone_number0','note'];
    public function Bills(){
        return $this->hasMany(Bills::class,'id_customer','id');
    }

}
