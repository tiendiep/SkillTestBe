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
        ->join('images', 'images.product_id', '=', 'products.id')
            ->where('brands.name', 'like', '%' . $brandName . '%') 
            ->select(
                'products.name', 'products.description', 'brands.name as brand_name', 'brands.country', 'images.url', 'products.prices'
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

  
    $products = Product::join('brands', 'products.brand_id', '=', 'brands.id')
    ->join('images', 'images.product_id', '=', 'products.id')
        ->whereBetween('products.prices', [$minPrice, $maxPrice]) 
        ->select(
            'products.name', 'products.description', 'brands.name as brand_name', 'brands.country', 'images.url', 'products.prices'
            
        )
        ->get();

  
    if ($products->isNotEmpty()) {
       
        return response()->json($products);
    } else {
        
        return response()->json(['error' => 'No products found within the specified price range'], 404);
    }
}

}
