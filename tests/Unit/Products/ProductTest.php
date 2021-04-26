<?php

namespace Tests\Unit;

use App\Cart\Money;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariation;

class ProductTest extends TestCase
{
    public function test_it_uses_a_slug_for_the_route_key()
    {
        $product = new Product();

        $this->assertEquals($product->getRoutekeyName(), 'slug');
    }

    public function test_it_has_many_categories()
    {
        $product = Product::factory()->create();

        $product->categories()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $product->categories->first());
    }

    public function test_it_has_variations()
    {
        $product = Product::factory()->create();

        $product->variations()->save(
            ProductVariation::factory()->create()
        );

        $this->assertInstanceOf(ProductVariation::class, $product->variations->first());
    }

    /** @test */
    public function test_it_returns_money_instance_for_price()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Money::class, $product->price);
    }

    public function test_it_returns_formatted_price()
    {
        $product = Product::factory()->create([
            'price' => 1000
        ]);

        $this->assertEquals($product->formattedPrice, '$10.00');
    }
}
