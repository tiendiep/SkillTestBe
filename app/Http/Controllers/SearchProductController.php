<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class SearchProductController extends Controller
{
    public function searchByBrand(Request $request)
    {
    
        $brandName = $request->input('brand_name'); 

        
        $products = Product::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_variant_images', 'product_variant_images.product_id', '=', 'products.id')
            ->where('brands.name', 'like', '%' . $brandName . '%') 
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
           

       
        if ($products->isNotEmpty()) {
            return response()->json($products);
        } else {
          
            return response()->json(['error' => 'No products found'], 404);
        }
    }
    public function searchByPrice(Request $request)
{
   
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    
    if (!$minPrice || !$maxPrice) {
        return response()->json(['error' => 'Both min_price and max_price are required'], 400);
    }

  
    $products = Product::
        join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('product_variant_images', 'product_variant_images.product_id', '=', 'products.id')
       
        ->whereBetween('product_variant_images.price', [$minPrice, $maxPrice]) // Lọc theo giá tiền
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

  
    if ($products->isNotEmpty()) {
       
        return response()->json($products);
    } else {
        
        return response()->json(['error' => 'No products found within the specified price range'], 404);
    }
}

}
