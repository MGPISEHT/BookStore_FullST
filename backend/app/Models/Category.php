<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Category extends Model
{
    //​protected $fillable ប្រើសម្រាប់កំណត់ថាតើអ្វីខ្លះដែលអាចបញ្ចូលបានក្នុងម៉ូដែលនេះ
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'order',
        'description',
    ];
    /**
     * The "booted" method of the model.
     * ប្រយសម្រាប់កំណត់ពេលដែលម៉ូដែលត្រូវបានបង្កើត ឬកែប្រែ
     *
     * @return void
     */

    protected static function booted()
    //​protected static function booted() ប្រយសម្រាប់កំណត់ពេលដែលម៉ូដែលត្រូវបានបង្កើត ឬកែប្រែ
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    /**
     * Get the parent category for the category.
     * ប្រយសម្រាប់ទាញយកក្រុមប្រភេទមាត្រាដែលមានឈ្មោះ parent
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the child categories for the category.
     * ប្រើសម្រាប់ទាញយកក្រុមប្រភេទកូនដែលមានឈ្មោះ children
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('order');
    }
}
