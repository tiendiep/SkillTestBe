<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductVariantImage;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ManagerProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'images'])->get();
        return view('products.index', compact('products'));
    }

  
    public function create()
    {
        $brands = Brand::all(); 
        return view('products.create', compact('brands'));
    }


    public function edit($id)
    { 
        
        $product = Product::with(['brand', 'images'])->find($id);
        $brands = Brand::all();
       
        return view('products.edit', compact('product', 'brands'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        $product->images()->delete();
    
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }






    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'color' => 'required|string',
            'size' => 'nullable|string',
            'stock' => 'required|integer',
            'image_url' => 'nullable|url',
        ]);
    
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'brand_id' => $validatedData['brand_id'],
        ]);
    
        $variant = ProductVariantImage::create([
            'product_id' => $product->id,
            'color' => $validatedData['color'],
            'size' => $validatedData['size'],
            'stock' => $validatedData['stock'],
            'price' => $validatedData['price'],
            'image_url' => $validatedData['image_url'],
        ]);
    
       
    
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công!');
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'color' => 'required|string',
            'size' => 'nullable|string',
            'stock' => 'required|integer',
            'image_url' => 'nullable|url',
        ]);
    
        $product = Product::findOrFail($id);
    
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'brand_id' => $validatedData['brand_id'],
        ]);
    
        $variant = $product->images()->updateOrCreate(
            ['color' => $validatedData['color']],
            [
                'size' => $validatedData['size'],
                'stock' => $validatedData['stock'],
                'price' => $validatedData['price'],
                'image_url' => $validatedData['image_url'],
            ]
        );
    
       
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    


}