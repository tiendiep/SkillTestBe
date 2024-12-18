<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariantImage;

class ProductVariantImageSeeder extends Seeder
{
    public function run()
    {
        // Ảnh biến thể cho iPhone 15 (product_id = 1)
        ProductVariantImage::create([
            'product_id' => 1, 
            'color' => 'Đỏ', 
            'size' => '128GB', 
            'stock' => 100, 
            'price' => 999.99, 
            'image_url' => 'https://example.com/iphone15-red-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 1, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 50, 
            'price' => 1099.99, 
            'image_url' => 'https://example.com/iphone15-blue-256gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 1, 
            'color' => 'Đen', 
            'size' => '512GB', 
            'stock' => 30, 
            'price' => 1199.99, 
            'image_url' => 'https://example.com/iphone15-black-512gb.jpg'
        ]);

        // Ảnh biến thể cho iPhone 14 (product_id = 2)
        ProductVariantImage::create([
            'product_id' => 2, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 150, 
            'price' => 799.99, 
            'image_url' => 'https://example.com/iphone14-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 2, 
            'color' => 'Trắng', 
            'size' => '256GB', 
            'stock' => 75, 
            'price' => 849.99, 
            'image_url' => 'https://example.com/iphone14-white-256gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 2, 
            'color' => 'Đỏ', 
            'size' => '512GB', 
            'stock' => 50, 
            'price' => 949.99, 
            'image_url' => 'https://example.com/iphone14-red-512gb.jpg'
        ]);

        // Ảnh biến thể cho iPhone SE (product_id = 3)
        ProductVariantImage::create([
            'product_id' => 3, 
            'color' => 'Đen', 
            'size' => '64GB', 
            'stock' => 200, 
            'price' => 399.99, 
            'image_url' => 'https://example.com/iphonese-black-64gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 3, 
            'color' => 'Trắng', 
            'size' => '128GB', 
            'stock' => 120, 
            'price' => 449.99, 
            'image_url' => 'https://example.com/iphonese-white-128gb.jpg'
        ]);

        // Ảnh biến thể cho Galaxy S23 (product_id = 6)
        ProductVariantImage::create([
            'product_id' => 6, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 80, 
            'price' => 899.99, 
            'image_url' => 'https://example.com/galaxys23-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 6, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 60, 
            'price' => 949.99, 
            'image_url' => 'https://example.com/galaxys23-blue-256gb.jpg'
        ]);

        // Ảnh biến thể cho Galaxy S22 (product_id = 7)
        ProductVariantImage::create([
            'product_id' => 7, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 90, 
            'price' => 799.99, 
            'image_url' => 'https://example.com/galaxys22-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 7, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 40, 
            'price' => 849.99, 
            'image_url' => 'https://example.com/galaxys22-blue-256gb.jpg'
        ]);

        // Ảnh biến thể cho Sony Xperia 1 IV (product_id = 11)
        ProductVariantImage::create([
            'product_id' => 11, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 70, 
            'price' => 1099.99, 
            'image_url' => 'https://example.com/sonyxperia1iv-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 11, 
            'color' => 'Bạc', 
            'size' => '256GB', 
            'stock' => 50, 
            'price' => 1199.99, 
            'image_url' => 'https://example.com/sonyxperia1iv-silver-256gb.jpg'
        ]);

        // Ảnh biến thể cho Sony Xperia 5 III (product_id = 12)
        ProductVariantImage::create([
            'product_id' => 12, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 120, 
            'price' => 899.99, 
            'image_url' => 'https://example.com/sonyxperia5iii-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 12, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 100, 
            'price' => 899.99, 
            'image_url' => 'https://example.com/sonyxperia5iii-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 12, 
            'color' => 'Bạc', 
            'size' => '256GB', 
            'stock' => 80, 
            'price' => 949.99, 
            'image_url' => 'https://example.com/sonyxperia5iii-silver-256gb.jpg'
        ]);

        // Ảnh biến thể cho Sony Xperia 10 III (product_id = 13)
        ProductVariantImage::create([
            'product_id' => 13, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 150, 
            'price' => 499.99, 
            'image_url' => 'https://example.com/sonyxperia10iii-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 13, 
            'color' => 'Trắng', 
            'size' => '256GB', 
            'stock' => 100, 
            'price' => 549.99, 
            'image_url' => 'https://example.com/sonyxperia10iii-white-256gb.jpg'
        ]);

        // Ảnh biến thể cho Sony Xperia 1 II (product_id = 14)
        ProductVariantImage::create([
            'product_id' => 14, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 80, 
            'price' => 799.99, 
            'image_url' => 'https://example.com/sonyxperia1ii-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 14, 
            'color' => 'Bạc', 
            'size' => '256GB', 
            'stock' => 50, 
            'price' => 849.99, 
            'image_url' => 'https://example.com/sonyxperia1ii-silver-256gb.jpg'
        ]);

        // Ảnh biến thể cho Sony Xperia L4 (product_id = 15)
        ProductVariantImage::create([
            'product_id' => 15, 
            'color' => 'Đen', 
            'size' => '64GB', 
            'stock' => 200, 
            'price' => 249.99, 
            'image_url' => 'https://example.com/sonyxperial4-black-64gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 15, 
            'color' => 'Xanh', 
            'size' => '128GB', 
            'stock' => 150, 
            'price' => 299.99, 
            'image_url' => 'https://example.com/sonyxperial4-blue-128gb.jpg'
        ]);

        // Ảnh biến thể cho LG OLED TV (product_id = 16)
        ProductVariantImage::create([
            'product_id' => 16, 
            'color' => 'Đen', 
            'size' => '55 inch', 
            'stock' => 50, 
            'price' => 1499.99, 
            'image_url' => 'https://example.com/lgoledtv-black-55inch.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 16, 
            'color' => 'Đen', 
            'size' => '65 inch', 
            'stock' => 30, 
            'price' => 1799.99, 
            'image_url' => 'https://example.com/lgoledtv-black-65inch.jpg'
        ]);

        // Ảnh biến thể cho LG Q70 (product_id = 17)
        ProductVariantImage::create([
            'product_id' => 17, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 100, 
            'price' => 349.99, 
            'image_url' => 'https://example.com/lgq70-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 17, 
            'color' => 'Trắng', 
            'size' => '64GB', 
            'stock' => 120, 
            'price' => 299.99, 
            'image_url' => 'https://example.com/lgq70-white-64gb.jpg'
        ]);

        // Ảnh biến thể cho LG Velvet (product_id = 18)
        ProductVariantImage::create([
            'product_id' => 18, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 150, 
            'price' => 599.99, 
            'image_url' => 'https://example.com/lgvelvet-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 18, 
            'color' => 'Hồng', 
            'size' => '256GB', 
            'stock' => 80, 
            'price' => 649.99, 
            'image_url' => 'https://example.com/lgvelvet-pink-256gb.jpg'
        ]);

        // Ảnh biến thể cho LG V60 ThinQ (product_id = 19)
        ProductVariantImage::create([
            'product_id' => 19, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 90, 
            'price' => 899.99, 
            'image_url' => 'https://example.com/lgv60thinq-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 19, 
            'color' => 'Trắng', 
            'size' => '256GB', 
            'stock' => 60, 
            'price' => 999.99, 
            'image_url' => 'https://example.com/lgv60thinq-white-256gb.jpg'
        ]);

        // Ảnh biến thể cho LG K92 (product_id = 20)
        ProductVariantImage::create([
            'product_id' => 20, 
            'color' => 'Đen', 
            'size' => '64GB', 
            'stock' => 150, 
            'price' => 249.99, 
            'image_url' => 'https://example.com/lgk92-black-64gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 20, 
            'color' => 'Xanh', 
            'size' => '128GB', 
            'stock' => 100, 
            'price' => 299.99, 
            'image_url' => 'https://example.com/lgk92-blue-128gb.jpg'
        ]);

        // Ảnh biến thể cho Huawei P50 Pro (product_id = 21)
        ProductVariantImage::create([
            'product_id' => 21, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 70, 
            'price' => 799.99, 
            'image_url' => 'https://example.com/huaweip50pro-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 21, 
            'color' => 'Vàng', 
            'size' => '256GB', 
            'stock' => 50, 
            'price' => 849.99, 
            'image_url' => 'https://example.com/huaweip50pro-gold-256gb.jpg'
        ]);

        // Ảnh biến thể cho Huawei Mate 40 Pro (product_id = 22)
        ProductVariantImage::create([
            'product_id' => 22, 
            'color' => 'Đen', 
            'size' => '256GB', 
            'stock' => 60, 
            'price' => 999.99, 
            'image_url' => 'https://example.com/huaweimate40pro-black-256gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 22, 
            'color' => 'Xanh', 
            'size' => '512GB', 
            'stock' => 40, 
            'price' => 1099.99, 
            'image_url' => 'https://example.com/huaweimate40pro-blue-512gb.jpg'
        ]);

        // Ảnh biến thể cho Huawei P40 (product_id = 23)
        ProductVariantImage::create([
            'product_id' => 23, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 100, 
            'price' => 599.99, 
            'image_url' => 'https://example.com/huaweip40-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 23, 
            'color' => 'Trắng', 
            'size' => '256GB', 
            'stock' => 80, 
            'price' => 649.99, 
            'image_url' => 'https://example.com/huaweip40-white-256gb.jpg'
        ]);

        // Ảnh biến thể cho Huawei Nova 9 (product_id = 24)
        ProductVariantImage::create([
            'product_id' => 24, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 150, 
            'price' => 399.99, 
            'image_url' => 'https://example.com/huaweinova9-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 24, 
            'color' => 'Vàng', 
            'size' => '256GB', 
            'stock' => 100, 
            'price' => 449.99, 
            'image_url' => 'https://example.com/huaweinova9-gold-256gb.jpg'
        ]);

        // Ảnh biến thể cho Huawei Y9a (product_id = 25)
        ProductVariantImage::create([
            'product_id' => 25, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 200, 
            'price' => 249.99, 
            'image_url' => 'https://example.com/huaweiy9a-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 25, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 150, 
            'price' => 299.99, 
            'image_url' => 'https://example.com/huaweiy9a-blue-256gb.jpg'
        ]);

        // Ảnh biến thể cho Redmi Note 12 (product_id = 26)
        ProductVariantImage::create([
            'product_id' => 26, 
            'color' => 'Đen', 
            'size' => '64GB', 
            'stock' => 300, 
            'price' => 199.99, 
            'image_url' => 'https://example.com/redminote12-black-64gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 26, 
            'color' => 'Xanh', 
            'size' => '128GB', 
            'stock' => 200, 
            'price' => 249.99, 
            'image_url' => 'https://example.com/redminote12-blue-128gb.jpg'
        ]);

        // Ảnh biến thể cho Xiaomi 13 (product_id = 27)
        ProductVariantImage::create([
            'product_id' => 27, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 80, 
            'price' => 699.99, 
            'image_url' => 'https://example.com/xiaomi13-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 27, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 60, 
            'price' => 749.99, 
            'image_url' => 'https://example.com/xiaomi13-blue-256gb.jpg'
        ]);

        // Ảnh biến thể cho Redmi K40 (product_id = 28)
        ProductVariantImage::create([
            'product_id' => 28, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 150, 
            'price' => 399.99, 
            'image_url' => 'https://example.com/redmik40-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 28, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 120, 
            'price' => 449.99, 
            'image_url' => 'https://example.com/redmik40-blue-256gb.jpg'
        ]);

        // Ảnh biến thể cho Poco X3 Pro (product_id = 29)
        ProductVariantImage::create([
            'product_id' => 29, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 200, 
            'price' => 249.99, 
            'image_url' => 'https://example.com/pocox3pro-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 29, 
            'color' => 'Xanh', 
            'size' => '256GB', 
            'stock' => 150, 
            'price' => 299.99, 
            'image_url' => 'https://example.com/pocox3pro-blue-256gb.jpg'
        ]);

        // Ảnh biến thể cho Xiaomi Mi 11 (product_id = 30)
        ProductVariantImage::create([
            'product_id' => 30, 
            'color' => 'Đen', 
            'size' => '128GB', 
            'stock' => 100, 
            'price' => 799.99, 
            'image_url' => 'https://example.com/xiaomimi11-black-128gb.jpg'
        ]);
        ProductVariantImage::create([
            'product_id' => 30, 
            'color' => 'Bạc', 
            'size' => '256GB', 
            'stock' => 60, 
            'price' => 849.99, 
            'image_url' => 'https://example.com/xiaomimi11-silver-256gb.jpg'
        ]);
    
    }
}
