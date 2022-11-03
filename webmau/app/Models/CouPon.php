<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouPon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = ['name_coupon','description','value'];
}
