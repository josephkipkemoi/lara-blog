<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_post_category()
    {
        // Create category
        $response = $this->post('api/v1/categories',[
            'category' => 'sports'
        ]);

        // Assert status code 201 to show category was created
        $response->assertCreated();
    }
}
