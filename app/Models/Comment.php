<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id','comment_body'];

    protected $casts = ['comment_id' => 'integer','comment_body' => 'string'];

    protected $hidden = ['created_at','updated_at','comment_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
