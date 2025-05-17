<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    //
    protected $table = 'shipping_addresses';
    protected $fillable = [
        'user_id',
        'recipient_name',
        'address_line1',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'address_line2',
        // 'address_line2' is optional, so it can be nullable in the migration
    ];
    // គេប្រើប្រាស់ fillable ដើម្បីកំណត់ថាអ្នកប្រើប្រាស់អាចបញ្ចូលទិន្នន័យអ្វីខ្លះទៅក្នុង table books
}
