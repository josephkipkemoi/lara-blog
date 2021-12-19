<?php

namespace Tests\Feature\Blog;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_post_tag()
    {
        // User adds tag
        $response = $this->post('api/v1/tags',[
            'tag' => 'laravel'
        ]);

        // Assert tag has been created
        $response->assertStatus(201);
    }

    public function test_can_get_tags_with_blog_post()
    {
        // Create user who creates blog post
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        // User adds tags to blog post
        $tag = Tag::factory()->create();
        $tag->blogs()->attach($blog);

        // Given the blog id, get all tags associated to the blog
        $response = $this->get("api/v1/tags/{$blog->id}");

        // response 200 and assert blog post has one tag
        $response->assertOk()
                 ->assertJsonCount(1);
    }

    public function test_can_get_posts_with_tag()
    {
        // Create user who creates the blog post
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        // Create tag and atttach to the post
        $tag = Tag::factory()->create();
        $blog->tags()->attach($tag);

        // Given the tag_id get all blogs associated with the tag name
        $response = $this->get("api/v1/tags?tag_id={$tag->id}");

        // Response 200 and one blog post return for given tag
        $response->assertOk()
                 ->assertJsonCount(1);
     }
}
