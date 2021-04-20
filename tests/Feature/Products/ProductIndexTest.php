<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductIndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_shows_a_product_collection()
    {
        $products = Product::factory()->count(2)->create();


        $response = $this->json('GET', '/api/products');

        $products->each(function ($product) use ($response) {
            $response->assertJsonFragment(
                ['id' => $product->id],
            );
        });
    }
}
