<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create(['name' => 'Apple', 'country' => 'USA']);
        Brand::create(['name' => 'Samsung', 'country' => 'South Korea']);
        Brand::create(['name' => 'Sony', 'country' => 'Japan']);
        Brand::create(['name' => 'LG', 'country' => 'South Korea']);
        Brand::create(['name' => 'Huawei', 'country' => 'China']);
        Brand::create(['name' => 'Xiaomi', 'country' => 'China']);
        Brand::create(['name' => 'Nokia', 'country' => 'Finland']);
        Brand::create(['name' => 'Motorola', 'country' => 'USA']);
        Brand::create(['name' => 'OnePlus', 'country' => 'China']);
        Brand::create(['name' => 'Oppo', 'country' => 'China']);
    }
}
