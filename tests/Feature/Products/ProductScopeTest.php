<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductScopeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_scope_by_category()
    {
        /*
            Attach category to product
            Create another product which isnt attached to that category
            assert json res to equal 1 as only one product is attached to category
        */
        $product = Product::factory()->create();

        $product->categories()->save(
            $category = Category::factory()->create()
        );

        $secondProduct = Product::factory()->create();

        $this->json("GET", "/api/products?category={$category->slug}")
            ->assertJsonCount(1, 'data');



    }
}
