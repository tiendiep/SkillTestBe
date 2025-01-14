<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function createOrder(array $orderData);
    public function createOrderItem(array $itemData);
    public function updateTotalPrice(int $orderId, float $totalPrice);
    public function decrementStock(int $productId, int $quantity);
}
