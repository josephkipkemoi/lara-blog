<?php

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Carbon;

// PHP 7.4
// class BlogData
// {
//     public string $title;

//     public string $body;

//     public string $author;

//     public static function fromRequest(
//         CreateBlogRequest $request
//     ): self {
//         return new self([
//             'title' => $request->get('title'),
//             'body' => $request->get('body'),
//             'author' => Carbon::make(
//                 $request->get('author')
//             ),
//         ]);
//     }
// }

// PHP 8.0
// $data = BlogData::fromRequest($blogRequest);

// PHP 8
class BlogData
{
    public function __construct(
        public string $body,
        public string $title,
        public string $author,
    ){}
}

$data = new BlogData(...$blogRequest->validated());
