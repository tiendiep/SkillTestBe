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
            'product_id' => 7,
            'product_variant_images_id' => 19,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 1,
            'product_id' => 7,
            'product_variant_images_id' => 20,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 1,
            'product_id' => 14,
            'product_variant_images_id' => 28,
            'quantity' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 2,
            'product_id' => 20,
            'product_variant_images_id' => 40,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 2,
            'product_id' => 27,
            'product_variant_images_id' => 55,
            'quantity' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 2,
            'product_id' => 1,
            'product_variant_images_id' => 10,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 3,
            'product_id' => 1,
            'product_variant_images_id' => 9,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 3,
            'product_id' => 12,
            'product_variant_images_id' => 24,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        CartItem::create([
            'user_id' => 3,
            'product_id' => 15,
            'product_variant_images_id' => 31,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
