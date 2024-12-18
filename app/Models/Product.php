<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductVariantImage::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}