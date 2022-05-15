<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class GoogleLoginController extends Controller
{
    public function getGoogleAuth()
    {
        return Socialite::driver('google')
            ->redirect();
    }

    public function authGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrCreate([
            'email' => $googleUser->email
        ], [
            'name' => $googleUser->name,
            'google_id' => $googleUser->getId(),
            'password' => Hash::make(uniqid()),
        ]);
        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
        }
        Auth::guard('web')->login($user, true);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
