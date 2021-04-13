<?php

namespace Tests\Unit\Models\Categories;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_has_many_children()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $category->children->first());
    }
}
