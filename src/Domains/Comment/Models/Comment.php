<?php

namespace Domains\Comment\Models;

use Domains\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id','comment_body','user_id','blog_id'];

    protected $casts = ['comment_id' => 'integer','comment_body' => 'string'];

    protected $hidden = ['created_at','updated_at','comment_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
