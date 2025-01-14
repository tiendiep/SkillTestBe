<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(array $orderData)
    {
        return Order::create($orderData);
    }

    public function createOrderItem(array $itemData)
    {
        return OrderItem::create($itemData);
    }

    public function updateTotalPrice(int $orderId, float $totalPrice)
    {
        return Order::where('id', $orderId)->update(['total_price' => $totalPrice]);
    }

    public function decrementStock(int $productId, int $quantity)
    {
       
        return DB::table('products')
            ->where('id', $productId)
            ->where('stock', '>=', $quantity)
            ->decrement('stock', $quantity);
    }
}
