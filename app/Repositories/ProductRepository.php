<?php

namespace App\Repositories;

use App\Models\Product;
<<<<<<< HEAD
use Illuminate\Pagination\LengthAwarePaginator; 
=======
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819

class ProductRepository implements ProductRepositoryInterface
{
    public function search($brandName = null, $minPrice = null, $maxPrice = null)
    {
        $query = Product::leftjoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->select(
                'products.name', 
                'products.description', 
                'brands.name as brand_name', 
                'brands.country', 
                'images.url', 
<<<<<<< HEAD
                'products.prices',
                'products.stock'
=======
                'products.prices'
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
            );

        if ($brandName) {
            $query->where('brands.name', 'like', '%' . $brandName . '%');
        }

        if ($minPrice && $maxPrice) {
            $query->whereBetween('products.prices', [$minPrice, $maxPrice]);
        }

        return $query->get();
    }

    public function findProductById($id)
    {
<<<<<<< HEAD
     
        return Product::leftjoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
=======
        return Product::leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
            ->select(
                'products.id',
                'products.name',
                'products.description',
                'brands.name as brand_name',
                'brands.country',
                'images.url as image_url',
<<<<<<< HEAD
                'products.prices',
                'products.stock'
=======
                'products.prices'
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
            )
            ->where('products.id', $id)
            ->first();
    }
    public function getAllProducts($filters = [], $perPage = 10): LengthAwarePaginator
    {
        $query = Product::with(['brand', 'images']);

        // Lọc theo brand_id nếu có
        if (isset($filters['brand_id']) && $filters['brand_id']) {
            $query->where('brand_id', $filters['brand_id']);
        }

<<<<<<< HEAD
       
=======
        // Lọc theo stock nếu có
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
        if (isset($filters['stock']) && $filters['stock'] !== '') {
            $query->where('stock', '>=', $filters['stock']);
        }

        return $query->paginate($perPage);
    }

<<<<<<< HEAD

=======
    // Hàm tạo sản phẩm mới
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
    public function createProduct($data)
    {
        $product = Product::create($data);

<<<<<<< HEAD
=======
        // Tạo ảnh nếu có image_url
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
        if (isset($data['image_url'])) {
            Image::create([
                'product_id' => $product->id,
                'url' => $data['image_url'],
            ]);
        }

        return $product;
    }

<<<<<<< HEAD
  
=======
    // Hàm cập nhật sản phẩm
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
    public function updateProduct($id, $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);

<<<<<<< HEAD
       
=======
        // Cập nhật hoặc tạo ảnh
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
        if (isset($data['image_url'])) {
            $image = $product->images()->first();
            if ($image) {
                $image->update([
                    'url' => $data['image_url'],
                ]);
            } else {
                $product->images()->create([
                    'url' => $data['image_url'],
                ]);
            }
        }

        return $product;
    }

<<<<<<< HEAD
    
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->images()->delete();  
        $product->delete(); 
=======
    // Hàm xóa sản phẩm
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->images()->delete();  // Xóa ảnh liên quan
        $product->delete();  // Xóa sản phẩm
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819

        return $product;
    }
}
