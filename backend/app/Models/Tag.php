<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';
    protected $fillable = [
        'name',
    ];
    // គេប្រើប្រាស់ fillable ដើម្បីកំណត់ថាអ្នកប្រើប្រាស់អាចបញ្ចូលទិន្នន័យអ្វីខ្លះទៅក្នុង table books
}
