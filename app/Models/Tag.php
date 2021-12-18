<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag','blog_id'];

    protected $casts = ['tag' => 'string'];

    protected $hidden = ['updated_at','created_at'];

    public function blog()
    {
        return $this->hasMany(Blog::class,'id','blog_id');
    }
}
