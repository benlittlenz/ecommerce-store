<?php

namespace Tests\Unit\Products;

use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;

class ProductVariationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_has_one_variation_type()
    {
        $variation =  ProductVariation::factory()->create();

        $this->assertInstanceOf(ProductVariationType::class, $variation->type);
    }

    public function test_it_belongs_to_a_product()
    {
        $variation =  ProductVariation::factory()->create();

        $this->assertInstanceOf(Product::class, $variation->product);
    }
}
