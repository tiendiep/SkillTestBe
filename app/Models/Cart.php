<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; 
    protected $fillable = ['user_id'];  


    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class); 
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product', 'cart_id', 'product_id')
                    ->withPivot('quantity'); 
    }
}
