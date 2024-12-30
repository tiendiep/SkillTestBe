<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductVariantImage;
use App\Models\Image;
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
        'image_url' => 'nullable|url',
    ]);

    
    $product = Product::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'prices' => $validatedData['price'], 
        'brand_id' => $validatedData['brand_id'],
    ]);

  
    if ($request->has('image_url')) {
        Image::create([
            'product_id' => $product->id,
            'url' => $validatedData['image_url'],
        ]);
    }

    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}

    
public function update(Request $request, $id)
{
    
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'brand_id' => 'required|exists:brands,id',
        'image_url' => 'nullable|url',
    ]);

    $product = Product::findOrFail($id);

 
    $product->update([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'prices' => $validatedData['price'],
        'brand_id' => $validatedData['brand_id'],
    ]);

  
    if ($request->has('image_url')) {
        $image = $product->images()->first(); 
        if ($image) {
          
            $image->update([
                'url' => $validatedData['image_url'],
            ]);
        } else {
          
            $product->images()->create([
                'url' => $validatedData['image_url'],
            ]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

}