<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id','comment_body'];

    protected $casts = ['comment_id' => 'integer','comment_body' => 'string'];

    public function validate($request)
    {
        // Validate request
        $request->validate(['comment_id' => 'required','comment_body' => 'required']);

        // Store to DB
        return Comment::create(['comment_id' => $request->comment_id,'comment_body' => $request->comment_body]);
    }
}
