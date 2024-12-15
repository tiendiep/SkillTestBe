<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create(['user_id' => 1, 'total_amount' => 1999.98]);
        Order::create(['user_id' => 2, 'total_amount' => 1799.99]);
        Order::create(['user_id' => 3, 'total_amount' => 999.99]);
        Order::create(['user_id' => 1, 'total_amount' => 1399.99]);
        Order::create(['user_id' => 2, 'total_amount' => 1099.99]);
        Order::create(['user_id' => 3, 'total_amount' => 499.99]);
        Order::create(['user_id' => 1, 'total_amount' => 699.99]);
        Order::create(['user_id' => 2, 'total_amount' => 899.99]);
        Order::create(['user_id' => 3, 'total_amount' => 1299.99]);
        Order::create(['user_id' => 1, 'total_amount' => 1699.99]);
    }
}
