<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitHubController extends Controller
{
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        // Retrieve the user from GitHub
        $user = Socialite::driver('github')->stateless()->user();

        // GitHub profile data
        $githubProfile = [
            'name' => $user->name,
            'nickname' => $user->nickname,
            'avatar' => $user->avatar,
            'email' => $user->email,
        ];

        // Get public repositories
        $repositories = Http::withHeaders([
            'Authorization' => 'Bearer ' . $user->token,
        ])->get('https://api.github.com/user/repos')->json();

        // Return to a view with profile and repository data
        return view('github.profile', [
            'profile' => $githubProfile,
            'repositories' => $repositories,
        ]);
    }
}
