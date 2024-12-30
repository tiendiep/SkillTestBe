<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function getCartItemsForUser(Request $request)
    {
        $user = $request->user();
    
        $cartItems = CartProduct::join('users', 'cart_product.user_id', '=', 'users.id')
            ->join('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('images', function($join) {
                $join->on('images.product_id', '=', 'products.id')
                     ->where('images.id', '=', \DB::raw("(SELECT MIN(id) FROM images WHERE product_id = products.id)"));
            })
            ->select(
                'cart_product.id',
                'users.name AS user_name',
                'products.name AS product_name',
                'products.prices',
                'images.url',
                'cart_product.quantity'
            )
            ->where('users.id', $user->id)
            ->get();
    
        return response()->json($cartItems);
    }
    

    public function addToCart(Request $request)
    {
        
        $user = $request->user();
        
    
        $cartItem = CartProduct::where('user_id', $user->id)
                            ->where('product_id', $request->product_id)

                            ->first();
        
        if ($cartItem) {
            
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
        
            CartProduct::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
            
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully']);
    }
public function updateCartQuantity(Request $request, $cartItemId)
{
    
    $cartItem = CartProduct::findOrFail($cartItemId);
    
    if ($cartItem->user_id != $request->user()->id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

 
    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    return response()->json(['message' => 'Cart quantity updated successfully']);
}

public function removeFromCart(Request $request, $cartItemId)
{
  
    $cartItem = CartProduct::findOrFail($cartItemId);

    
    if ($cartItem->user_id != $request->user()->id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

  
    $cartItem->delete();

    return response()->json(['message' => 'Product removed from cart successfully']);
}

}
