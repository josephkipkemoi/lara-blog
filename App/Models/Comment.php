<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Qirolab\Laravel\Reactions\Traits\Reactable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Qirolab\Laravel\Reactions\Contracts\ReactableInterface;

class Comment extends Model implements ReactableInterface
{
    use HasFactory, Reactable ;

    protected $fillable = ['comment_id','comment_body','user_id','blog_id'];

    protected $casts = ['comment_id' => 'integer','comment_body' => 'string'];

    protected $hidden = ['created_at','updated_at','comment_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasOne(Comment::class);
    }
}
