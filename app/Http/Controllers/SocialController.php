<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Validator, Redirect, Response, File;

class SocialController extends Controller

{
    public function redirect($provider)

    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)

    {
        $getInfo = Socialite::driver($provider)->user();
//        dd($getInfo);
        $user = $this->findOrCreateUser($getInfo, $provider);
        auth()->login($user);
        return redirect()->route('users.index');
    }
    function findOrCreateUser($getInfo, $provider)
    {
        $user = User::where('email', $getInfo->email)->first();
        if (!$user) {
            $user = User::create([

                'name' => $getInfo->name,

                'email' => $getInfo->email,

                'provider' => $provider,

                'provider_id' => $getInfo->id
            ]);
        }
        return $user;

    }

}


