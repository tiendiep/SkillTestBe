<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Cache::remember('products', 3600, function () {
            return Product::paginate(10);
        });

        return response()->json($products);
    }

    public function show($id)
    {
        $product = $this->productService->findProductById($id);

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }

  
    public function search(Request $request)
    {
        $products = $this->productService->searchProducts(
            $request->input('brand_name'),
            $request->input('min_price'),
            $request->input('max_price')
        );

        return response()->json($products);
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

        $productData = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'prices' => $validatedData['price'],
            'brand_id' => $validatedData['brand_id'],
            'stock' => $validatedData['stock'],
        ];

        $product = $this->productService->createProduct($productData, $validatedData['image_url'] ?? null);

        return response()->json($product, 201);
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

        $productData = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'prices' => $validatedData['price'],
            'brand_id' => $validatedData['brand_id'],
            'stock' => $validatedData['stock'],
        ];

        $product = $this->productService->updateProduct($id, $productData, $validatedData['image_url'] ?? null);

        return response()->json($product);
    }


    public function destroy($id)
    {
        $product = $this->productService->deleteProduct($id);

        if ($product) {
            return response()->json(['message' => 'Product deleted successfully!']);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }
}
