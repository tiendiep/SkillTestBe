<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Repositories\CartRepositoryInterface;  // Thêm dòng này để sử dụng CartRepositoryInterface
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartProduct;

class CartController extends Controller
{
    protected $cartRepository;
    protected $cartService;

    
    public function __construct(CartRepositoryInterface $cartRepository, CartService $cartService)
    {
        $this->cartRepository = $cartRepository;
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        try {
            $this->cartService->addToCart($request->user()->id, $request->product_id, $request->quantity);
            return response()->json(['message' => 'Product added to cart'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function updateCartQuantity(Request $request, $cartItemId)
    {
        try {
            $this->cartService->updateCartQuantity($cartItemId, $request->quantity);
            return response()->json(['message' => 'Cart quantity updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function removeFromCart($cartItemId)
    {
        try {
            $this->cartService->removeFromCart($cartItemId);
            return response()->json(['message' => 'Product removed from cart'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function getCart()
    {
        $userId = Auth::id();
        $cartItems = $this->cartRepository->getCartItemsForUser($userId);

        return response()->json($cartItems);
    }
}
