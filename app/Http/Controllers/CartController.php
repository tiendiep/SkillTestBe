<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function getCartItemsForUser(Request $request)
{
    $user = $request->user();


    $cartItems = CartItem::join('users', 'cart_items.user_id', '=', 'users.id')
    ->join('products', 'cart_items.product_id', '=', 'products.id')
    ->join('product_variant_images', 'cart_items.product_variant_images_id', '=', 'product_variant_images.id')
    ->select(
        'cart_items.id',
        'users.name AS user_name',
        'products.name AS product_name',
        'product_variant_images.price',
        'product_variant_images.color',
        'product_variant_images.size',
        'product_variant_images.image_url',
        'cart_items.quantity'
    )
    ->where('users.id', $user->id) 
    ->get();
        

    return response()->json($cartItems);
}

public function addToCart(Request $request)
{
    
    $user = $request->user();
    
    
    $cartItem = CartItem::where('user_id', $user->id)
                        ->where('product_id', $request->product_id)
                        ->where('product_variant_images_id', $request->product_variant_images_id)
                        ->first();
    
    if ($cartItem) {
        
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
    
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'product_variant_images_id' => $request->product_variant_images_id,
            'quantity' => $request->quantity,
        ]);
    }

    return response()->json(['message' => 'Product added to cart successfully']);
}
public function updateCartQuantity(Request $request, $cartItemId)
{
    
    $cartItem = CartItem::findOrFail($cartItemId);
    
    if ($cartItem->user_id != $request->user()->id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

 
    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    return response()->json(['message' => 'Cart quantity updated successfully']);
}

public function removeFromCart(Request $request, $cartItemId)
{
  
    $cartItem = CartItem::findOrFail($cartItemId);

    
    if ($cartItem->user_id != $request->user()->id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

  
    $cartItem->delete();

    return response()->json(['message' => 'Product removed from cart successfully']);
}

}