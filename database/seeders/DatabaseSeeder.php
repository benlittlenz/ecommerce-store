<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $firstProduct = Product::factory()->create([
            'name' => 'Nike',
            'slug' => 'nike',
            'description' => 'Lorem ipsum',
            'price' => 150,
        ]);

        $secondProduct =  Product::factory()->create([
            'name' => 'Puma',
            'slug' => 'puma',
            'description' => 'Lorem ipsum',
            'price' => 200,
        ]);
        $firstProduct->categories()->save(
            Category::factory()->create([
                'name' => 'Shoes',
                'slug' => 'shoes',
            ])
        );

        $secondProduct->categories()->save(
            Category::factory()->create([
                'name' => 'Hats',
                'slug' => 'hats',
            ])
        );
    }
}
