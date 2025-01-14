<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ManagerProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $query = Product::with(['brand', 'images']);

        if ($request->has('brand_id') && $request->brand_id != '') {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->has('price') && $request->price != '') {
            $query->where('prices', '<=', $request->price);
        }

        $products = $this->productService->getAllProducts($request->all(), 10);
        $brands = Brand::all();

        return view('products.index', compact('products', 'brands'));
    }

    public function create()
    {
        $brands = Brand::all(); 
        return view('products.create', compact('brands'));
    }

    public function edit($id)
    { 
        $product = $this->productService->findProductById($id);
        $brands = Brand::all();
       
        return view('products.edit', compact('product', 'brands'));
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

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
            'stock' => 'required|integer|min:0', 
        ]);

        $this->productService->createProduct($validatedData);

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
            'stock' => 'required|integer|min:0', 
        ]);

        $this->productService->updateProduct($id, $validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
}
