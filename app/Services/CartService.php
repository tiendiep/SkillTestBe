<?php
namespace App\Services;

use App\Repositories\CartRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $cartRepository;
    protected $productRepository;

    public function __construct(CartRepositoryInterface $cartRepository, ProductRepositoryInterface $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function addToCart($userId, $productId, $quantity)
    {
        $product = $this->productRepository->findProductById($productId);

        if ($product->stock < $quantity) {
            throw new \Exception('Not enough stock available');
        }

        return $this->cartRepository->addToCart($userId, $productId, $quantity);
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
        return $this->cartRepository->removeFromCart($cartItemId);
    }

    public function getCartTotalPrice($userId)
    {
        $cartItems = $this->cartRepository->getCartItemsForUser($userId);

        return $cartItems->sum(function ($cartItem) {
            return $cartItem->total_price;
        });
    }
}
