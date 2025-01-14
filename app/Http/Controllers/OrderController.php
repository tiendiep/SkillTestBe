<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder(Request $request)
    {
      
        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
     

        try {
           
            $order = $this->orderService->createOrder($validatedData['items']);
            
           
            return response()->json($order, 201);
        } catch (\Exception $e) {
          
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
