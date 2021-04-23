<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Category;
use PHPUnit\Framework\TestCase;

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
}
