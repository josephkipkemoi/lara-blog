<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostBlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_post_blog()
    {
        $response = $this->post('api/blog',[
            'title' => 'some Title',
            'body' => 'some body'
        ]);

        $response->assertStatus(201);

    }
}
