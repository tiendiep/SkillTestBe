<?php
namespace App\Repositories;

interface CartRepositoryInterface
{
    public function getCartItemsForUser($userId);

    public function addToCart($userId, $productId, $quantity);

    public function updateCartQuantity($cartItemId, $quantity);

    public function removeFromCart($cartItemId);
}
