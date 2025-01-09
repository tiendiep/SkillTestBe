<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run()
    {
        // Thêm dữ liệu mẫu cho bảng carts
        Cart::create([
            'user_id' => User::inRandomOrder()->first()->id,
        ]);
    }
}
