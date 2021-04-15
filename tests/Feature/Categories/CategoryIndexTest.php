<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryIndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_a_collection_of_categories()
    {
        $categories = Category::factory()->count(2)->create();

        $response = $this->json('GET', '/api/categories');

        $categories->each(function ($category) use ($response) {
            $response->assertJsonFragment(
                ['slug' => $category->slug],
            );
        });
    }

    public function test_it_returns_parent_categories()
    {
        $category = Category::factory()->count(2)->create();

        $category->children()->save(
            Category::factory()->count(2)->create()
        );

        $this->json('GET', '/api/categories')
            ->assertJsonCount(1, 'data');
    }
}
