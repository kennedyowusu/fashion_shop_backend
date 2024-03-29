<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'double',
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'is_new',
        'is_featured',
        'is_popular',
        'category_id',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the orders that belong to the product.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
