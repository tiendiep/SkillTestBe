<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        // Hình ảnh cho các sản phẩm của iPhone (brand_id = 1)
        ProductImage::create(['product_id' => 1, 'product_variant_id' => 1, 'image_url' => 'https://example.com/iphone15-red-64gb.jpg']);
        ProductImage::create(['product_id' => 1, 'product_variant_id' => 2, 'image_url' => 'https://example.com/iphone15-blue-128gb.jpg']);
        ProductImage::create(['product_id' => 1, 'product_variant_id' => 3, 'image_url' => 'https://example.com/iphone15-black-256gb.jpg']);

        ProductImage::create(['product_id' => 2, 'product_variant_id' => 4, 'image_url' => 'https://example.com/iphone14-black-64gb.jpg']);
        ProductImage::create(['product_id' => 2, 'product_variant_id' => 5, 'image_url' => 'https://example.com/iphone14-white-128gb.jpg']);
        ProductImage::create(['product_id' => 2, 'product_variant_id' => 6, 'image_url' => 'https://example.com/iphone14-red-128gb.jpg']);

        // Hình ảnh cho các sản phẩm iPhone SE (product_id = 3)
        ProductImage::create(['product_id' => 3, 'product_variant_id' => 7, 'image_url' => 'https://example.com/iphonese-black-64gb.jpg']);
        ProductImage::create(['product_id' => 3, 'product_variant_id' => 8, 'image_url' => 'https://example.com/iphonese-white-128gb.jpg']);
       

        // Hình ảnh cho các sản phẩm iPhone 13 Pro (product_id = 4)
        ProductImage::create(['product_id' => 4, 'product_variant_id' => 9 ,'image_url' => 'https://example.com/iphone13pro-spacegray-128gb.jpg']);
        ProductImage::create(['product_id' => 4, 'product_variant_id' => 10, 'image_url' => 'https://example.com/iphone13pro-silver-256gb.jpg']);
        ProductImage::create(['product_id' => 4, 'product_variant_id' => 11, 'image_url' => 'https://example.com/iphone13pro-gold-512gb.jpg']);

        // Hình ảnh cho các sản phẩm iPhone 12 (product_id = 5)
        ProductImage::create(['product_id' => 5, 'product_variant_id' => 12, 'image_url' => 'https://example.com/iphone12-black-64gb.jpg']);
        ProductImage::create(['product_id' => 5, 'product_variant_id' => 13, 'image_url' => 'https://example.com/iphone12-white-128gb.jpg']);
        ProductImage::create(['product_id' => 5, 'product_variant_id' => 14, 'image_url' => 'https://example.com/iphone12-blue-128gb.jpg']);

        // Hình ảnh cho các sản phẩm Galaxy S23 (product_id = 6)
        ProductImage::create(['product_id' => 6, 'product_variant_id' => 15, 'image_url' => 'https://example.com/galaxys23-black-128gb.jpg']);
        ProductImage::create(['product_id' => 6, 'product_variant_id' => 16, 'image_url' => 'https://example.com/galaxys23-blue-256gb.jpg']);
    

        // Hình ảnh cho các sản phẩm Galaxy S22 (product_id = 7)
        ProductImage::create(['product_id' => 7, 'product_variant_id' => 17, 'image_url' => 'https://example.com/galaxys22-black-128gb.jpg']);
        ProductImage::create(['product_id' => 7, 'product_variant_id' => 18, 'image_url' => 'https://example.com/galaxys22-blue-256gb.jpg']);
      

        // Hình ảnh cho các sản phẩm Galaxy A53 (product_id = 8)
        ProductImage::create(['product_id' => 8, 'product_variant_id' => 19, 'image_url' => 'https://example.com/galaxya53-black-64gb.jpg']);
        ProductImage::create(['product_id' => 8, 'product_variant_id' => 20, 'image_url' => 'https://example.com/galaxya53-blue-128gb.jpg']);
       

        // Hình ảnh cho các sản phẩm Galaxy Note 20 (product_id = 9)
        ProductImage::create(['product_id' => 9, 'product_variant_id' => 21, 'image_url' => 'https://example.com/galaxynote20-black-128gb.jpg']);
        ProductImage::create(['product_id' => 9, 'product_variant_id' => 22, 'image_url' => 'https://example.com/galaxynote20-blue-256gb.jpg']);
      
        // Hình ảnh cho các sản phẩm Galaxy Z Fold 4 (product_id = 10)
        ProductImage::create(['product_id' => 10, 'product_variant_id' => 23, 'image_url' => 'https://example.com/galaxyzfold4-black-256gb.jpg']);
        ProductImage::create(['product_id' => 10, 'product_variant_id' => 24, 'image_url' => 'https://example.com/galaxyzfold4-blue-512gb.jpg']);
       

        // Hình ảnh cho các sản phẩm Sony Xperia 1 IV (product_id = 11)
        ProductImage::create(['product_id' => 11, 'product_variant_id' => 25, 'image_url' => 'https://example.com/sonyxperia1iv-black-128gb.jpg']);
       

        // Hình ảnh cho các sản phẩm Sony Xperia 5 III (product_id = 12)
        ProductImage::create(['product_id' => 12, 'product_variant_id' => 26, 'image_url' => 'https://example.com/sonyxperia5iii-black-128gb.jpg']);
       

        // Hình ảnh cho các sản phẩm Sony Xperia 10 III (product_id = 13)
        ProductImage::create(['product_id' => 13, 'product_variant_id' => 27, 'image_url' => 'https://example.com/sonyxperia10iii-black-64gb.jpg']);
      

        ProductImage::create(['product_id' => 14, 'product_variant_id' => 28, 'image_url' => 'https://example.com/sonyxperia10iii-black-64gb.jpg']);
        ProductImage::create(['product_id' => 15, 'product_variant_id' => 29, 'image_url' => 'https://example.com/sonyxperia10iii-black-64gb.jpg']);
        ProductImage::create(['product_id' => 16, 'product_variant_id' => 30, 'image_url' => 'https://example.com/lgoledtv-green-64gb.jpg']);
        // Add similar images for the rest of the products here, following the same pattern for each brand and model
    }
}
