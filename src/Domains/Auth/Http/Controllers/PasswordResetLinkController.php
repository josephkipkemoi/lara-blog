<?php

namespace Domains\Auth\Http\Controllers;

use Domains\Auth\Http\Controllers\Controller;
use Domains\Auth\Http\Requests\CreatePasswordLinkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle incoming password reset link
     *
     * @param \Illuminate\Http\Request
     * @param \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
    */

    public function store(Request $request)
    {
        $request->validate(['email' => ['required']]);
        // send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                          ? response()->json(['status' => __($status)])
                          : throw ValidationException::withMessages([
                              'email' => [__($status)]
                          ]);
    }
}
