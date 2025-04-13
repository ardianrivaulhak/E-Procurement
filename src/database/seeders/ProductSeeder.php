<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Vendor;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $vendorIds = Vendor::pluck('id');

        foreach (range(1, 50) as $i) {
            Product::create([
                'vendor_id'   => $faker->randomElement($vendorIds),
                'name'        => $faker->words(3, true),
                'description' => $faker->paragraph,
                'price'       => $faker->randomFloat(2, 10000, 1000000),
            ]);
        }
    }
}
