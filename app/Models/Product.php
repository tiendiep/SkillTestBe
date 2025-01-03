<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['brand_id', 'name', 'description', 'prices','stock'];
=======
    protected $fillable = ['brand_id', 'name', 'description', 'prices', 'stock'];
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }
}
