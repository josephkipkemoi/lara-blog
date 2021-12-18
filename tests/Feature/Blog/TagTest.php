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
}
