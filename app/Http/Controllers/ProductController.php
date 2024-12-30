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
    $product =Product::join('brands', 'brands.id', '=', 'products.brand_id')
    ->join('images', 'images.product_id', '=', 'products.id')
    ->select('products.name', 'products.description', 'brands.name as brand_name', 'brands.country', 'images.url', 'products.prices')
    ->get();

  
if ($product->isNotEmpty()) {
    
    return response()->json($product);
} else {
  
    return response()->json(['error' => 'Product not found'], 404);
}
}


}
