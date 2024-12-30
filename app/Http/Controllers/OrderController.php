<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
  
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalAmount = 0;
        $products = [];

        foreach ($validated['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);

            $totalAmount += $product->price * $item['quantity'];
            $products[] = [
                'product' => $product,
                'quantity' => $item['quantity'],
            ];
        }

        DB::beginTransaction();

        try {
            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $totalAmount,
            ]);

  
            foreach ($products as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['product']->price,
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order->load('orderItems'),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Error creating order',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
