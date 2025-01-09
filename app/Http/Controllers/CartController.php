<?php
namespace App\Http\Controllers;

use App\Repositories\CartRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartRepository;
    protected $productRepository;

    public function __construct(CartRepositoryInterface $cartRepository, ProductRepositoryInterface $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function getCartItemsForUser(Request $request)
    {
        $user = $request->user();
        $cartItems = $this->cartRepository->getCartItemsForUser($user->id);
        return response()->json($cartItems);
    }

    public function addToCart(Request $request)
    {
        try {
            $user = $request->user();
            $this->cartRepository->addToCart($user->id, $request->product_id, $request->quantity);
            return response()->json(['message' => 'Product added to cart successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function updateCartQuantity(Request $request, $cartItemId)
    {
        try {
            $this->cartRepository->updateCartQuantity($cartItemId, $request->quantity);
            return response()->json([], 200); 
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    public function removeFromCart(Request $request, $cartItemId)
    {
        try {
            $this->cartRepository->removeFromCart($cartItemId);
            return response()->json([], 200); 
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
}
