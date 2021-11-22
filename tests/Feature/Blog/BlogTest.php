<?php

namespace Tests\Feature;

// use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $response = $this->post('/api/blog',[
            'title' => $this->faker->title(),
            'author' => $this->faker->name(),
            'body' => $this->faker->text()
        ]);

        $response->assertCreated()
                 ->assertJsonStructure([
                     'title',
                     'author',
                     'body'
                 ]);
    }
}
