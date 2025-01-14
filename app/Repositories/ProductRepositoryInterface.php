<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function search($brandName = null, $minPrice = null, $maxPrice = null);

    public function findProductById($id);

    public function getAllProducts($filters = [], $perPage = 10): LengthAwarePaginator;

    public function createProduct($data);

    public function updateProduct($id, $data);

    public function deleteProduct($id);
}
