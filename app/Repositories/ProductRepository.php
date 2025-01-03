<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator; 

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
                'products.prices',
                'products.stock'
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
     
        return Product::leftjoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                'products.description',
                'brands.name as brand_name',
                'brands.country',
                'images.url as image_url',
                'products.prices',
                'products.stock'
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

       
        if (isset($filters['stock']) && $filters['stock'] !== '') {
            $query->where('stock', '>=', $filters['stock']);
        }

        return $query->paginate($perPage);
    }


    public function createProduct($data)
    {
        $product = Product::create($data);

        if (isset($data['image_url'])) {
            Image::create([
                'product_id' => $product->id,
                'url' => $data['image_url'],
            ]);
        }

        return $product;
    }

  
    public function updateProduct($id, $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);

       
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

    
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->images()->delete();  
        $product->delete(); 

        return $product;
    }
}
