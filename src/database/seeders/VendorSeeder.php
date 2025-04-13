<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use Faker\Factory as Faker;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $i) {
            Vendor::create([
                'name'    => $faker->name,
                'email'   => $faker->unique()->safeEmail,
                'company' => $faker->company,
                'status'  => $faker->randomElement(['pending', 'approved']),
            ]);
        }
    }
}
