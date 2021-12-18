<?php

namespace Tests\Feature\Blog;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
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
    public function test_can_post_tags_with_blog()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $response = $this->post('api/v1/tags',[
            'tag' => 'laravel',
            'blog_id' => $blog->id
        ]);

        $response->assertStatus(201);
    }

    public function test_can_get_tags_with_post()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $tag = Tag::factory()->count(5)->create(['blog_id' => $blog->id]);
        $response = $this->get("api/v1/tags/{$blog->id}");

        $response->assertOk();
        // assert blog post has five tags
        $response->assertJsonCount(5);
    }

    public function test_can_get_posts_with_tag()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $tag = Tag::factory()->create(['blog_id' => $blog->id]);
        dd($tag);
        $response = $this->get("api/v1/tags?tag_id={$blog->id}");
    }
}
