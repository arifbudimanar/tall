<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Masmerise\Toaster\Toaster;

class SocialiteController extends Controller
{
    public function redirectGithub(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        if (empty($githubUser->name)) {
            $githubUser->name = $githubUser->nickname;
        }

        if (Auth::check()) {
            if (User::where('github_id', $githubUser->id)->first()) {
                Toaster::error('This Github account is already linked with another account.');

                return redirect()->intended(route('user.profile'));
            }

            Auth::user()->update([
                'github_id' => $githubUser->id,
                'github_name' => $githubUser->name,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]);
            Toaster::success('Github account connected.');

            return redirect()->intended(route('user.profile'));
        } else {
            if ($user = User::where('github_id', $githubUser->id)->first()) {
                $user->update([
                    'github_name' => $githubUser->name,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]);
                Auth::guard('web')->login($user, true);
                Toaster::success('Logged in with Github.');

                return redirect()->intended(route('user.dashboard'));
            }

            if ($user = User::where('email', $githubUser->email)->first()) {
                $user->update([
                    'github_id' => $githubUser->id,
                    'github_name' => $githubUser->name,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]);
                Auth::guard('web')->login($user, true);
                Toaster::success('Logged in with Github.');

                return redirect()->intended(route('user.dashboard'));
            }
        }

        return redirect()->route('password.create', [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_name' => $githubUser->name,
            'github_username' => $githubUser->nickname,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }

    public function redirectGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();

        if (Auth::check()) {
            if (User::where('google_id', $googleUser->id)->first()) {
                Toaster::error('This Google account is already linked with another account.');

                return redirect()->intended(route('user.profile'));
            }

            Auth::user()->update([
                'google_id' => $googleUser->id,
                'google_name' => $googleUser->name,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);
            Toaster::success('Google account connected.');

            return redirect()->intended(route('user.profile'));
        } else {
            if ($user = User::where('google_id', $googleUser->id)->first()) {
                $user->update([
                    'google_name' => $googleUser->name,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
                Auth::guard('web')->login($user, true);
                Toaster::success('Logged in with Google.');

                return redirect()->intended(route('user.dashboard'));
            }

            if ($user = User::where('email', $googleUser->email)->first()) {
                $user->update([
                    'google_id' => $googleUser->id,
                    'google_name' => $googleUser->name,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
                Auth::guard('web')->login($user, true);
                Toaster::success('Logged in with Google.');

                return redirect()->intended(route('user.dashboard'));
            }
        }

        return redirect()->route('password.create', [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'google_name' => $googleUser->name,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    }
}
