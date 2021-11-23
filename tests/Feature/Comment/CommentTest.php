<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{

    use WithFaker;

    public function test_can_post_comment()
    {
        $response = $this->post('/api/comment',[
            'comment_id' => 1,
            'comment_body' => $this->faker->text()
        ]);

        $response->assertStatus(201);
    }

    public function test_can_get_comment()
    {
        $response = $this->get('/api/comment/1');

        $response->assertOk();
    }
}
