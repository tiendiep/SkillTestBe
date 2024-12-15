<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariant;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        // Product variants for iPhone brand (product_id = 1 to 5)
        ProductVariant::create(['product_id' => 1, 'color' => 'Red', 'size' => '64GB', 'stock' => 50, 'price' => 999.99]);
        ProductVariant::create(['product_id' => 1, 'color' => 'Blue', 'size' => '128GB', 'stock' => 30, 'price' => 1099.99]);
        ProductVariant::create(['product_id' => 1, 'color' => 'Black', 'size' => '256GB', 'stock' => 20, 'price' => 1199.99]);

        ProductVariant::create(['product_id' => 2, 'color' => 'Black', 'size' => '128GB', 'stock' => 40, 'price' => 899.99]);
        ProductVariant::create(['product_id' => 2, 'color' => 'White', 'size' => '256GB', 'stock' => 25, 'price' => 999.99]);
        ProductVariant::create(['product_id' => 2, 'color' => 'Red', 'size' => '64GB', 'stock' => 15, 'price' => 849.99]);

        ProductVariant::create(['product_id' => 3, 'color' => 'Silver', 'size' => '64GB', 'stock' => 100, 'price' => 399.99]);
        ProductVariant::create(['product_id' => 3, 'color' => 'Space Grey', 'size' => '128GB', 'stock' => 50, 'price' => 449.99]);

        ProductVariant::create(['product_id' => 4, 'color' => 'Gold', 'size' => '128GB', 'stock' => 30, 'price' => 1099.99]);
        ProductVariant::create(['product_id' => 4, 'color' => 'Silver', 'size' => '256GB', 'stock' => 20, 'price' => 1199.99]);
        ProductVariant::create(['product_id' => 4, 'color' => 'Graphite', 'size' => '512GB', 'stock' => 15, 'price' => 1299.99]);

        ProductVariant::create(['product_id' => 5, 'color' => 'White', 'size' => '64GB', 'stock' => 50, 'price' => 699.99]);
        ProductVariant::create(['product_id' => 5, 'color' => 'Black', 'size' => '128GB', 'stock' => 35, 'price' => 749.99]);
        ProductVariant::create(['product_id' => 5, 'color' => 'Blue', 'size' => '256GB', 'stock' => 20, 'price' => 849.99]);

        // Product variants for Samsung brand (product_id = 6 to 10)
        ProductVariant::create(['product_id' => 6, 'color' => 'Phantom Black', 'size' => '128GB', 'stock' => 40, 'price' => 899.99]);
        ProductVariant::create(['product_id' => 6, 'color' => 'Green', 'size' => '256GB', 'stock' => 20, 'price' => 999.99]);

        ProductVariant::create(['product_id' => 7, 'color' => 'White', 'size' => '128GB', 'stock' => 30, 'price' => 799.99]);
        ProductVariant::create(['product_id' => 7, 'color' => 'Pink Gold', 'size' => '256GB', 'stock' => 15, 'price' => 899.99]);

        ProductVariant::create(['product_id' => 8, 'color' => 'Awesome Black', 'size' => '128GB', 'stock' => 50, 'price' => 349.99]);
        ProductVariant::create(['product_id' => 8, 'color' => 'Awesome White', 'size' => '256GB', 'stock' => 25, 'price' => 399.99]);

        ProductVariant::create(['product_id' => 9, 'color' => 'Mystic Bronze', 'size' => '128GB', 'stock' => 40, 'price' => 999.99]);
        ProductVariant::create(['product_id' => 9, 'color' => 'Mystic Black', 'size' => '256GB', 'stock' => 15, 'price' => 1099.99]);

        ProductVariant::create(['product_id' => 10, 'color' => 'Phantom Black', 'size' => '256GB', 'stock' => 20, 'price' => 1799.99]);
        ProductVariant::create(['product_id' => 10, 'color' => 'Graygreen', 'size' => '512GB', 'stock' => 10, 'price' => 1899.99]);

        // Product variants for other brands like Sony, LG, Huawei, etc.
        ProductVariant::create(['product_id' => 11, 'color' => 'Purple', 'size' => '256GB', 'stock' => 10, 'price' => 1099.99]);
        ProductVariant::create(['product_id' => 12, 'color' => 'Black', 'size' => '55 inches', 'stock' => 15, 'price' => 1499.99]);
        ProductVariant::create(['product_id' => 13, 'color' => 'Silver', 'size' => '128GB', 'stock' => 35, 'price' => 799.99]);
        ProductVariant::create(['product_id' => 14, 'color' => 'Grey', 'size' => '64GB', 'stock' => 50, 'price' => 199.99]);
        ProductVariant::create(['product_id' => 15, 'color' => 'Blue', 'size' => '128GB', 'stock' => 40, 'price' => 499.99]);
        ProductVariant::create(['product_id' => 16, 'color' => 'Green', 'size' => '256GB', 'stock' => 20, 'price' => 699.99]);
    }
}
