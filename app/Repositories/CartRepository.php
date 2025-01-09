<?php
namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Repositories\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
    public function getCartItemsForUser($userId)
    {
        return Cart::leftjoin('users', 'cart.user_id', '=', 'users.id')
            ->leftjoin('cart_product', 'cart_product.cart_id', '=', 'cart.id')
            ->leftjoin('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('images', function($join) {
                $join->on('images.product_id', '=', 'products.id')
                     ->where('images.id', '=', DB::raw("(SELECT MIN(id) FROM images WHERE product_id = products.id)"));
            })
            ->select(
                'cart_product.id',
                'users.name AS user_name',
                'products.name AS product_name',
                'products.prices',
                'images.url',
                'cart_product.quantity'
            )
            ->where('users.id', $userId)
            ->get();
    }

    public function addToCart($userId, $productId, $quantity)
    {
        $product = Product::findOrFail($productId);

       
        if ($product->stock < $quantity) {
            throw new \Exception('Not enough stock available');
        }

        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cartItem = CartProduct::where('cart_id', $cart->id)
                               ->where('product_id', $productId)
                               ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
          
            if ($cartItem->quantity > $product->stock) {
                throw new \Exception('Not enough stock available');
            }
            $cartItem->save();
        } else {
            CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }
    }

    public function updateCartQuantity($cartItemId, $quantity)
    {
        $cartItem = CartProduct::findOrFail($cartItemId);
        $product = $cartItem->product;

   
        if ($quantity > $product->stock) {
            throw new \Exception('Not enough stock available');
        }

        $cartItem->quantity = $quantity;
        $cartItem->save();
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = CartProduct::findOrFail($cartItemId);
        $cartItem->delete();
    }
}
