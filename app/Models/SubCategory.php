<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Boot method to generate slug
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($subCategory) {
            if (empty($subCategory->slug)) {
                $subCategory->slug = Str::slug($subCategory->name);
            }
        });
        
        static::updating(function ($subCategory) {
            if ($subCategory->isDirty('name') && empty($subCategory->slug)) {
                $subCategory->slug = Str::slug($subCategory->name);
            }
        });
    }

    /**
     * Get the category that owns the subcategory
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get products for this subcategory
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Scope for active subcategories
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope for ordered subcategories
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
