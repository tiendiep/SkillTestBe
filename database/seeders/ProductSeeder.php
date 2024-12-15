<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Product entries for iPhone brand (brand_id = 1)
        Product::create(['name' => 'iPhone 15', 'description' => 'Latest iPhone model', 'price' => 999.99, 'brand_id' => 1]);
        Product::create(['name' => 'iPhone 14', 'description' => 'Previous iPhone model', 'price' => 799.99, 'brand_id' => 1]);
        Product::create(['name' => 'iPhone SE', 'description' => 'Affordable iPhone model', 'price' => 399.99, 'brand_id' => 1]);
        Product::create(['name' => 'iPhone 13 Pro', 'description' => 'Pro version of iPhone 13', 'price' => 1099.99, 'brand_id' => 1]);
        Product::create(['name' => 'iPhone 12', 'description' => 'Older iPhone model', 'price' => 699.99, 'brand_id' => 1]);

        // Product entries for Samsung brand (brand_id = 2)
        Product::create(['name' => 'Galaxy S23', 'description' => 'Samsung flagship phone', 'price' => 899.99, 'brand_id' => 2]);
        Product::create(['name' => 'Galaxy S22', 'description' => 'Previous Samsung flagship', 'price' => 799.99, 'brand_id' => 2]);
        Product::create(['name' => 'Galaxy A53', 'description' => 'Affordable Galaxy A series', 'price' => 349.99, 'brand_id' => 2]);
        Product::create(['name' => 'Galaxy Note 20', 'description' => 'Note series with S Pen', 'price' => 999.99, 'brand_id' => 2]);
        Product::create(['name' => 'Galaxy Z Fold 4', 'description' => 'Samsung foldable phone', 'price' => 1799.99, 'brand_id' => 2]);

        // Product entries for Sony brand (brand_id = 3)
        Product::create(['name' => 'Sony Xperia 1 IV', 'description' => 'Premium Sony phone', 'price' => 1099.99, 'brand_id' => 3]);
        Product::create(['name' => 'Sony Xperia 5 III', 'description' => 'Compact premium phone', 'price' => 899.99, 'brand_id' => 3]);
        Product::create(['name' => 'Sony Xperia 10 III', 'description' => 'Mid-range Sony phone', 'price' => 499.99, 'brand_id' => 3]);
        Product::create(['name' => 'Sony Xperia 1 II', 'description' => 'Older Xperia model', 'price' => 799.99, 'brand_id' => 3]);
        Product::create(['name' => 'Sony Xperia L4', 'description' => 'Entry-level Xperia phone', 'price' => 249.99, 'brand_id' => 3]);

        // Product entries for LG brand (brand_id = 4)
        Product::create(['name' => 'LG OLED TV', 'description' => 'LG 4K OLED TV', 'price' => 1499.99, 'brand_id' => 4]);
        Product::create(['name' => 'LG Q70', 'description' => 'Mid-range LG smartphone', 'price' => 349.99, 'brand_id' => 4]);
        Product::create(['name' => 'LG Velvet', 'description' => 'Stylish LG smartphone', 'price' => 599.99, 'brand_id' => 4]);
        Product::create(['name' => 'LG V60 ThinQ', 'description' => 'Premium LG smartphone', 'price' => 899.99, 'brand_id' => 4]);
        Product::create(['name' => 'LG K92', 'description' => 'Affordable LG smartphone', 'price' => 249.99, 'brand_id' => 4]);

        // Product entries for Huawei brand (brand_id = 5)
        Product::create(['name' => 'Huawei P50 Pro', 'description' => 'Huawei flagship smartphone', 'price' => 799.99, 'brand_id' => 5]);
        Product::create(['name' => 'Huawei Mate 40 Pro', 'description' => 'Huawei’s premium flagship', 'price' => 999.99, 'brand_id' => 5]);
        Product::create(['name' => 'Huawei P40', 'description' => 'Huawei’s affordable flagship', 'price' => 599.99, 'brand_id' => 5]);
        Product::create(['name' => 'Huawei Nova 9', 'description' => 'Mid-range Huawei phone', 'price' => 399.99, 'brand_id' => 5]);
        Product::create(['name' => 'Huawei Y9a', 'description' => 'Affordable mid-range smartphone', 'price' => 249.99, 'brand_id' => 5]);

        // Product entries for Xiaomi brand (brand_id = 6)
        Product::create(['name' => 'Redmi Note 12', 'description' => 'Affordable Xiaomi phone', 'price' => 199.99, 'brand_id' => 6]);
        Product::create(['name' => 'Xiaomi 13', 'description' => 'Xiaomi flagship phone', 'price' => 699.99, 'brand_id' => 6]);
        Product::create(['name' => 'Redmi K40', 'description' => 'Xiaomi performance phone', 'price' => 399.99, 'brand_id' => 6]);
        Product::create(['name' => 'Poco X3 Pro', 'description' => 'Budget performance phone', 'price' => 249.99, 'brand_id' => 6]);
        Product::create(['name' => 'Xiaomi Mi 11', 'description' => 'Xiaomi’s premium phone', 'price' => 799.99, 'brand_id' => 6]);

        // Continue similarly for other brands (Nokia, Motorola, OnePlus, Oppo, etc.)
    }
}
