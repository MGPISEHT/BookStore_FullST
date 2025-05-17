<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $table = 'cart_items';
    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];
}
