<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
       
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.product_variant_id' => 'required|exists:product_variants,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

      
        $totalAmount = 0;
        
        foreach ($validated['items'] as $item) {
            $variant = ProductVariant::find($item['product_variant_id']);
            if ($variant->stock < $item['quantity']) {
                return response()->json(['message' => 'Insufficient stock for product'], 400);
            }
            $totalAmount += $variant->price * $item['quantity'];
        }

        
        DB::beginTransaction();

        try {
       
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $totalAmount,
            ]);

            
            foreach ($validated['items'] as $item) {
                $variant = ProductVariant::find($item['product_variant_id']);
             
                $variant->stock -= $item['quantity'];
                $variant->save();

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $variant->product_id,
                    'quantity' => $item['quantity'],
                    'price' => $variant->price,
                ]);
            }

    
            DB::commit();

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order
            ], 201);
        } catch (\Exception $e) {
           
            DB::rollback();
            return response()->json(['message' => 'Error creating order'], 500);
        }
    }
}
