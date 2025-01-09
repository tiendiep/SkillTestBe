<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
        $product = $this->productRepository->findProductById($id);

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }

    public function search(Request $request)
    {
        $products = $this->productRepository->search(
            $request->input('brand_name'),
            $request->input('min_price'),
            $request->input('max_price')
        );

        return response()->json($products);
    }
}




