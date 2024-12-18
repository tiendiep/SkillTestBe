<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
{
    $products = Cache::remember('products', 3600, function () {
        return Product::all();
    });

    return response()->json($products);
}
public function show($id)
{
    $product =Product::join('brands', 'products.brand_id', '=', 'brands.id')
    ->join('product_variant_images', 'product_variant_images.product_id', '=', 'products.id')
    ->where('products.id', $id)
    ->select(
            'products.name', 
            'products.description', 
            'brands.name as brand_name', 
            'brands.country as brand_country', 
            'product_variant_images.color', 
            'product_variant_images.size', 
            'product_variant_images.stock', 
            'product_variant_images.price', 
            'product_variant_images.image_url'
    )
    ->get();
  
if ($product->isNotEmpty()) {
    
    return response()->json($product);
} else {
  
    return response()->json(['error' => 'Product not found'], 404);
}
}


}
