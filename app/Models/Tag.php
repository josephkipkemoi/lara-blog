<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];

    protected $casts = ['tag' => 'string'];

    protected $hidden = ['updated_at','created_at'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class,'blog_tags','tag_id','blog_id');
    }
}
