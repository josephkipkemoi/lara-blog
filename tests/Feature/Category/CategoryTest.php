<?php

namespace Tests\Feature\Category;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_post_category()
    {
        // Create category
        $response = $this->post('api/v1/categories',[
            'category' => 'sports'
        ]);

        // Assert status code 201 to show category was created
        $response->assertCreated();
    }

    public function test_can_get_posts_from_category()
    {
        // create blog
        $blog = Blog::factory()->create();

        // create category
        $category = Category::factory()->create();

        // attach blog to its category
        $blog->category()->attach($category);

        // get posts associated with category id
        $response = $this->get("api/v1/categories/{$category->id}");

        // assert status 200 and posts associated with category are returned
        $response->assertOk()
                 ->assertJsonCount(1);
    }
}
