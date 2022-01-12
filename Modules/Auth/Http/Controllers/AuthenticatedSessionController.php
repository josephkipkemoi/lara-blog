<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\CreateLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     *  Handle incoming authentication request
     *
     *  @param \App\Http\Requests\CreateLoginRequest $request
     *  @return \Illuminate\Http\Response
    */
    public function store(CreateLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return response()->noContent();
    }

    /**
     *  Destroy an authenticated session
     *
     *  @param \Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
