<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_post_comment()
    {
        $blog = Blog::factory()->create();

        $response = $this->post("api/v1/blogs/{$blog->id}/comments",[
            'comment_body' => $this->faker->text()
        ]);

        $response->assertStatus(201);
    }

    public function test_can_get_comment()
    {
        $comment = Comment::factory()
                        ->for(Blog::factory(),'blog')
                        ->create();


        $response = $this->get("api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}");

        $response->assertOk();
    }

    public function test_can_delete_comment()
    {
        $comment = Comment::factory()
                        ->for(Blog::factory(),'blog')
                        ->create();


        $response = $this->delete("api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}");

        $response->assertOk();

        $this->assertDeleted($comment);
    }

    public function test_can_update_comment()
    {
        $comment = Comment::factory()
                        ->for(Blog::factory(),'blog')
                        ->create();


        $response = $this->patch("api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}", [
            'comment_body' => 'updated comment body'
        ]);

        // dd($response);
        $response->assertOk();
        $this->assertEquals('updated comment body',$comment->fresh()->comment_body);

    }
}
