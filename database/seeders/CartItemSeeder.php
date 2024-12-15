<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartItem;

class CartItemSeeder extends Seeder
{
    public function run()
    {
        // Thêm bản ghi trực tiếp cho từng người dùng và sản phẩm
        CartItem::create([
            'user_id' => 1,
            'product_id' => 1,
            'product_variants_id' => 9,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 1,
            'product_id' => 4,
            'product_variants_id' => 10,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 1,
            'product_id' => 4,
            'product_variants_id' => 11,
            'quantity' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 2,
            'product_id' => 7,
            'product_variants_id' => 17,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 2,
            'product_id' => 7,
            'product_variants_id' => 18,
            'quantity' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 2,
            'product_id' => 3,
            'product_variants_id' => 8,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 3,
            'product_id' => 1,
            'product_variants_id' => 3,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 3,
            'product_id' => 8,
            'product_variants_id' => 19,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 3,
            'product_id' => 15,
            'product_variants_id' => 29,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
