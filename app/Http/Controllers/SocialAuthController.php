<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Services\SocialAuthService;

class SocialAuthController extends Controller
{
    public function redirectf()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function redirectg()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectl()
    {
        return Socialite::driver('linkedin')->redirect();

    }
    public function callbackf(SocialAuthService $service)
    {
    	$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
    	auth()->login($user);
        

        return redirect()->to('/home');
    }
    public function callbackg(SocialAuthService $service)
    {

        $user = $service->createOrGetUser(Socialite::driver('google')->user());
    	auth()->login($user);


        return redirect()->to('/home');
    }
    public function callbackl(SocialAuthService $service)
    {

        $user = $service->createOrGetUser(Socialite::driver('linkedin')->user());
    	auth()->login($user);

        return redirect()->to('/home');
    }
}