<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Thêm một số dữ liệu mẫu cho bảng orders
        Order::create([
            'user_id' => User::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một user
            'total_price' => 100.50,
            'created_at' => now(),
        ]);
    }
}
