<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // check if user is authorized to perfom store action on this resource;
        return Gate::inspect('create-post')->allowed();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'featured' => ['required', 'boolean'],
            'blog_title' => ['required', 'boolean'],
            'category' => ['required'],
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['string'],
            'tag' => ['string']
        ];
    }
}
