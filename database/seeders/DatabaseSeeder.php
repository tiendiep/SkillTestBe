<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            BrandSeeder::class,
            OrderItemSeeder::class,
            OrderSeeder::class,
            CartSeeder::class,
            UserSeeder::class,
        ]);
        //
    }
}
