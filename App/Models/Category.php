<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public const CATEGORY_CSS = 1;

    public const CATEGORY_JAVASCRIPT = 2;

    public const CATEGORY_HTML = 3;

    public const CATEGORY_LARAVEL = 4;

    public const CATEGORY_WEBDEVELOPEMENT = 5;

    protected $fillable = ['category'];

    protected $casts = ['category' => 'string'];

    protected $hidden = ['updated_at','created_at'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }
}
