<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\DTO\CreateUserDTO;
use Modules\Auth\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\CreateRegisteredUserRequest;
use Modules\Auth\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
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
        $user = User::create((array) new CreateUserDTO(...$request->validated()));

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
