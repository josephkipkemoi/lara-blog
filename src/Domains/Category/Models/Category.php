<?php

namespace Domains\Category\Models;
use Domains\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category'];

    protected $casts = ['category' => 'string'];

    protected $hidden = ['updated_at','created_at'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }
}
