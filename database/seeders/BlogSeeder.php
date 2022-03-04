<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // create blog from user in factory
      $category = Category::factory()->create();
      
      $blog =  Blog::factory()
                ->has(Comment::factory()->count(4))
                ->create();
                
      $category->blog()->attach($blog->id);
        // Create tag to attach to post
      $tag1 = Tag::factory()->create();

      // attach tags to blog post
      $tag1->blogs()->attach($blog);
      // attach blog post to tag
      $blog->tags()->attach($tag1);
    }
}
