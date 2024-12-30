<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Tạo nhiều sản phẩm mẫu
        foreach (range(1, 10) as $index) {
            $product = Product::create([
                'brand_id' => Brand::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một brand
                'name' => 'Product Sample ' . $index,
                'description' => 'This is a sample product description for product ' . $index . '.',
                'prices' => rand(100, 1000), // Thêm giá ngẫu nhiên cho mỗi sản phẩm
            ]);

            // Tạo ít nhất 3 hình ảnh cho mỗi sản phẩm
            foreach (range(1, 3) as $imageIndex) {
                Image::create([
                    'product_id' => $product->id,
                    'url' => 'https://via.placeholder.com/300?text=Image+' . $imageIndex . '+for+' . $product->name, // Placeholder image URL
                ]);
            }
        }
    }
}
