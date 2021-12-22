<?php

use Domains\Auth\Http\Controllers\AuthenticatedSessionController;
use Domains\Auth\Http\Controllers\RegisteredUserController;
use Domains\Auth\Http\Controllers\PasswordResetLinkController;
use Domains\Auth\Http\Controllers\NewPasswordController;

use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                                ->middleware('guest')
                                ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                                ->middleware('guest')
                                ->name('password.update');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                        ->middleware('guest')
                        ->name('logout');
