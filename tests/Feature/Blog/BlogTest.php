<?php

namespace Tests\Feature;

// use App\Models\Blog;

use App\Models\Blog;
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
        $post = Blog::factory()->raw();

        $response = $this->post('/api/blogs',$post);

        $response->assertCreated()
                 ->assertJson(fn(AssertableJson $json) => (
                     $json->has('title')
                          ->whereType('title','string')
                          ->etc()
                 ));
    }


    public function test_can_get_blog()
    {
        $response = $this->get('/api/blog?user_id=1');

        $response->assertOk()
                 ->assertJsonStructure([
                     'current_page',
                     'data' => []
                 ]);
    }

    public function test_can_edit_and_update_blog()
    {
        $response = $this->put('/api/blog/1?blog_id=7&title=new Title&body=new Body');

        $response->assertOk();
    }

    public function test_can_get_blog_by_id()
    {
        $response = $this->get('/api/blog/7');

        $response->assertOk()
                 ->assertJsonStructure([
                     'title',
                     'author',
                     'body'
                 ]);
    }

    public function test_can_remove_blog()
    {
        $response = $this->delete('/api/blog/7');

        $response->assertOk();
    }
}
