<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegisteredUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /*
      * Handle an incoming registration request.
      *
      *  @param \Illuminate\Http\Request $request
      *  @return \Illuminate\Http\Response
      *
      *  @throws \Illuminate\Validation\ValidationException
      *
    */

    public function store(CreateRegisteredUserRequest $request)
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
