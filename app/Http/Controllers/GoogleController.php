<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;


class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->scopes(['openid', 'profile', 'email', 'https://www.googleapis.com/auth/contacts.readonly'])->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            // You can store the user information in your database here

            return redirect(config('app.frontend_url').'/dashboard?connected=google');
        } catch (Exception $e) {
            return redirect(config('app.frontend_url').'/dashboard?error=google');
        }
    }
}