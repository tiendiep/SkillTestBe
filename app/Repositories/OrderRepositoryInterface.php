<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function createOrder(array $items);
}
