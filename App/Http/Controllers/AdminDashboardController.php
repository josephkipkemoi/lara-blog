<?php

namespace App\Http\Controllers;

class AdminDashboardController extends Controller
{
    //
    public function __invoke()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['string'],
            'tag' => ['string']
        ]);

        auth()->user()->blog()->create($data);

        session()->flash('status', 'Blog added successfully !');

        return redirect()->route('admin.create');
    }
}
