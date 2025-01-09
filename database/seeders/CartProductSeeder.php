<?php

namespace Database\Seeders;

use App\Models\CartProduct;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartProductSeeder extends Seeder
{
    public function run()
    {
        // Thêm dữ liệu mẫu cho bảng cart_product
        CartProduct::create([
            'cart_id' => Cart::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'quantity' => 3,
        ]);
    }
}
