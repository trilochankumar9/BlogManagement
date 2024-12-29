<?php

  

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use Exception;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

  

class GoogleController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

        

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->user();

       

            $finduser = User::where('google_id', $user->id)->first();

       

            if($finduser){

       

                Auth::login($finduser);

      

                return redirect()->intended('/user/dashboard');

       

            }else{

                $newUser = User::create([

                    'name' => $user->name,
                    'user_type' => "user",

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('122566')

                ]);

      

                Auth::login($newUser);

      

                return redirect()->intended('user/dashboard');

            }

      

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

}