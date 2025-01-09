<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(array $items)
    {
        DB::beginTransaction();

        try {
            $totalAmount = 0;
            $products = [];

           
            foreach ($items as $item) {
                $product = Product::lockForUpdate()->findOrFail($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Not enough stock for product: {$product->name}");
                }

                $totalAmount += $product->prices * $item['quantity'];

                $products[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                ];
            }

    
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $totalAmount,
            ]);

            foreach ($products as $item) {
                OrderItem::create([
                    'orders_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['product']->prices,
                ]);

           
                $item['product']->decrement('stock', $item['quantity']);
            }

            DB::commit();

            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
