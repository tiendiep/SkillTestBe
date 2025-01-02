<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts'; 
    protected $fillable = ['user_id', 'status'];  

    public function products()
    {
        return $this->hasMany(CartProduct::class); 
    }

    public function totalPrice()
    {
        return $this->products()->sum(function ($cartProduct) {
            return $cartProduct->quantity * $cartProduct->product->price;
        });
    }
}
