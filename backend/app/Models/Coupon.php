<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'discount_amount',
        'discount_type',
        'valid_from',
        'valid_to',
        'usage_limit',
        'used_count',

    ];
    // គេប្រើប្រាស់ fillable ដើម្បីកំណត់ថាអ្នកប្រើប្រាស់អាចបញ្ចូលទិន្នន័យអ្វីខ្លះទៅក្នុង table coupons
}
