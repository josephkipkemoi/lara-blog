<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_post_comment()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $response = $this->post("api/v1/blogs/{$blog->id}/comments",[
            'blog_id' => $blog->id,
            'comment_body' => $this->faker->text(),
            'user_id' => $user->id
        ]);

        $response->assertStatus(201);
    }

    public function test_can_get_comment()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $comment = $blog->comments()->create([
            'comment_body' => 'some comment body',
            'user_id' => $user->id,
            'blog_id' => $blog->id
        ]);

        $response = $this->get("api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}");

        $response->assertOk();
    }

    public function test_can_delete_comment()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $comment = $blog->comments()->create([
            'comment_body' => 'some comment',
            'user_id' => $user->id,
            'blog_id' => $blog->id
        ]);

        $response = $this->delete("api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}");

        $response->assertOk();

        $this->assertDeleted($comment);
    }

    public function test_can_update_comment()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->for($user)->create();

        $comment = $blog->comments()->create([
            'comment_body' => 'some comment',
            'user_id' => $user->id,
            'blog_id' => $blog->id
        ]);


        $response = $this->patch("api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}", [
            'comment_body' => 'updated comment body'
        ]);

        $response->assertOk();
        $this->assertEquals('updated comment body',$comment->fresh()->comment_body);
    }
}
