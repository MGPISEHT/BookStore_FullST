<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publishers';
    protected $fillable = [
        'name',
        'contact_email',
        'contact_phone',
        'address',
    ];
}
