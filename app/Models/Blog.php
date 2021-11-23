<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','author'];

    protected $casts = ['title' => 'string','author' => 'string','body' => 'string'];

    protected $hidden = ['updated_at'];

    public function validate($request)
    {
        // validate request
        $request->validate(['title' => 'required','body' => 'required']);

        // store request values to database
        return Blog::create($request->all());
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }
}
