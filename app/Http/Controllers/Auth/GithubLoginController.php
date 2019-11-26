<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Models\Test;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GithubLoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $testCount = Test::stats();

        $screenshotsPaths = collect([
            'algotesthome.png',
            'algotestproposer.png',
            'algotestliste.png',
            'algotestcommenter.png'
        ]);

        return view('github.login', compact('testCount', 'screenshotsPaths'));
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return redirect()->route('github.login');
        }
        // dd($user);
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
    }
}
