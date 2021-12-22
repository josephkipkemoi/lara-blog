<?php

namespace Domains\Blog\Models;

use Domains\Comment\Models\Comment;
use Domains\Tag\Models\Tag;
use Domains\Category\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','author','user_id'];

    protected $casts = ['title' => 'string','author' => 'string','body' => 'string'];

    protected $hidden = ['updated_at','created_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'blog_tags','blog_id','tag_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
