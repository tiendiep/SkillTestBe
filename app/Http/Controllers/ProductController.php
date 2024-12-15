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
    ->join('product_variants', 'product_variants.product_id', '=', 'products.id')
    ->join('product_images', function ($join) {
        $join->on('product_images.product_id', '=', 'products.id')
             ->on('product_images.product_variant_id', '=', 'product_variants.id');
    })
    ->where('products.id', $id)
    ->select(
        'products.name', 
        'products.description', 
        'brands.name as brand_name', 
        'brands.country as brand_country', 
        'product_variants.color', 
        'product_variants.size', 
        'product_variants.stock', 
        'product_variants.price', 
        'product_images.image_url'
    )
    ->get();
  
if ($product->isNotEmpty()) {
    
    return response()->json($product);
} else {
  
    return response()->json(['error' => 'Product not found'], 404);
}
}


}
