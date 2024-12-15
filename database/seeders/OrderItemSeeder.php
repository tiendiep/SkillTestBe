<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        OrderItem::create(['order_id' => 1, 'product_id' => 1, 'quantity' => 1, 'price' => 999.99]);
        OrderItem::create(['order_id' => 1, 'product_id' => 2, 'quantity' => 1, 'price' => 999.99]);
        OrderItem::create(['order_id' => 2, 'product_id' => 3, 'quantity' => 1, 'price' => 1099.99]);
        OrderItem::create(['order_id' => 3, 'product_id' => 4, 'quantity' => 1, 'price' => 1499.99]);
        OrderItem::create(['order_id' => 4, 'product_id' => 5, 'quantity' => 1, 'price' => 799.99]);
        OrderItem::create(['order_id' => 5, 'product_id' => 6, 'quantity' => 1, 'price' => 199.99]);
        OrderItem::create(['order_id' => 6, 'product_id' => 7, 'quantity' => 1, 'price' => 499.99]);
        OrderItem::create(['order_id' => 7, 'product_id' => 8, 'quantity' => 1, 'price' => 699.99]);
        OrderItem::create(['order_id' => 8, 'product_id' => 9, 'quantity' => 1, 'price' => 799.99]);
        OrderItem::create(['order_id' => 9, 'product_id' => 10, 'quantity' => 1, 'price' => 749.99]);
    }
}
