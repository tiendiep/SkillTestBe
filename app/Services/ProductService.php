<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;

class ProductService 
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function searchProducts($brandName = null, $minPrice = null, $maxPrice = null)
    {
        return $this->productRepository->search($brandName, $minPrice, $maxPrice);
    }

    public function findProductById($id)
    {
        return $this->productRepository->findProductById($id);
    }
    public function getAllProducts($filters = [], $perPage = 10)
    {
       
        return $this->productRepository->getAllProducts($filters, $perPage);
    }
    public function createProduct($data)
    {
        return $this->productRepository->createProduct($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->productRepository->updateProduct($id, $data);
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
