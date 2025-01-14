<?php

namespace App\Services;

use App\Repositories\OrderRepositoryInterface;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService 
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(array $items)
{
    DB::beginTransaction();

    try {
        $totalAmount = 0;

        $order = $this->orderRepository->createOrder([
            'user_id' => Auth::id(),
            'total_price' => 0,
        ]);

        foreach ($items as $item) {
            $this->processOrderItem($item, $order, $totalAmount);
        }

   
        $totalAmount = round($totalAmount, 2);

        
        $this->orderRepository->updateTotalPrice($order->id, $totalAmount);

        DB::commit();

        return $order;
    } catch (Exception $e) {
        DB::rollBack();
        throw $e;
    }
}

    private function processOrderItem(array $item, $order, float &$totalAmount)
    {
        $productId = $item['product_id'];
        $quantity = $item['quantity'];

        
        if (!$this->orderRepository->decrementStock($productId, $quantity)) {
            throw new Exception("Not enough stock for product ID: {$productId}");
        }

        $product = Product::find($productId);
        if (!$product) {
            throw new Exception("Product with ID {$productId} not found");
        }
        
        $totalAmount += $product->prices * $quantity;

     
        $this->orderRepository->createOrderItem([
            'orders_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $product->prices,
        ]);
    }
}
