<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;

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

        $variationType = ProductVariationType::factory()->create([
            'name' => 'Size'
        ]);

        $variationType2 = ProductVariationType::factory()->create([
            'name' => 'Quantity'
        ]);

        ProductVariation::factory()->create([
            'product_id' => $firstProduct->id,
            'name' => 'Medium',
            'price' => 120,
            'order' => 1,
            'product_variations_type_id' => $variationType->id,
        ]);

        ProductVariation::factory()->create([
            'product_id' => $firstProduct->id,
            'name' => 'Large',
            'price' => 150,
            'order' => 2,
            'product_variations_type_id' => $variationType->id,
        ]);

        ProductVariation::factory()->create([
            'product_id' => $firstProduct->id,
            'name' => '5',
            'price' => 150,
            'order' => 2,
            'product_variations_type_id' => $variationType2->id,
        ]);

        ProductVariation::factory()->create([
            'product_id' => $firstProduct->id,
            'name' => '10',
            'price' => 150,
            'order' => 2,
            'product_variations_type_id' => $variationType2->id,
        ]);
    }
}
