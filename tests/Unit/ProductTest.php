<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_it_uses_a_slug_for_the_route_key()
    {
        $product = new Product();

        $this->assertEquals($product->getRoutekeyName(), 'slug');
    }
}
