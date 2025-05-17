<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
    ];
    // គេប្រប្រើប្រាស់ fillable ដើម្បីកំណត់ថាអ្នកអាចបញ្ចូលទិន្នន័យណាខ្លះទៅក្នុង table payments
}
