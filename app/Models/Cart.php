<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'cart'; 
    protected $fillable = ['user_id'];  


    public function cartProducts()
=======
    protected $table = 'carts'; 
    protected $fillable = ['user_id', 'status'];  

    public function products()
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
    {
        return $this->hasMany(CartProduct::class); 
    }

<<<<<<< HEAD
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product', 'cart_id', 'product_id')
                    ->withPivot('quantity'); 
=======
    public function totalPrice()
    {
        return $this->products()->sum(function ($cartProduct) {
            return $cartProduct->quantity * $cartProduct->product->price;
        });
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
    }
}
