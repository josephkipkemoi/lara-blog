<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_can_post_blog()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->raw();
        $response = $this->post("api/v1/blogs", $blog);

        $response->assertCreated()
                 ->assertJson(fn(AssertableJson $json) => (
                     $json->has('title')
                          ->whereType('title','string')
                          ->etc()
                 ));
    }


    public function test_can_get_blogs()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $response = $this->get("api/v1/blogs");

        $response->assertOk()
                 ->assertJsonStructure([
                     'current_page',
                     'data' => []
                 ]);
    }

    public function test_can_update_blog()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $response = $this->patch("api/v1/blogs/{$blog->id}", [
            'title' => 'updated Title',
            'body' => 'updated Body',
            'author' => 'Greek Thompson'
        ]);

        $response->assertOk();

        $this->assertEquals('updated Title', $blog->fresh()->title);
    }


    public function test_can_get_blog_by_id()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $response = $this->get("api/v1/blogs/{$blog->id}");

        $response->assertOk()
                 ->assertJsonStructure([
                     'title',
                     'author',
                     'body'
                 ]);
    }

    public function test_can_remove_blog()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $response = $this->delete("api/v1/blogs/{$blog->id}");

        $response->assertOk();

        $this->assertDeleted($blog);
    }
}
