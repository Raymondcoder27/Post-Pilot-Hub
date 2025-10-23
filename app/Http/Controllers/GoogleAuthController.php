<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;


class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        // return Socialite::driver('google')->scopes(['openid', 'profile', 'email', 'https://www.googleapis.com/auth/contacts.readonly'])->redirect();
         return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
            $user = Socialite::driver('google')->user();
            // You can store the user information in your database here
            // dd($user);
            $findUser = User::where('google_id', $user->id)->first();
            if(!is_null($findUser)){
                Auth::login($findUser);
            }else{
                $findUser = User::create([
                    'name'=> $user->name,
                    'email'=> $user->email,
                    'password'=> Hash::make(Str::random(16)), // random password,
                    'google_id'=> $user->id,
                ]);
                Auth::login($findUser);
            }
            // return redirect(config('app.frontend_url').'/dashboard?connected=google');
            return redirect('dashboard');
    }
}