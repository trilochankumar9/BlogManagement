<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService{
        public function registration($data){
                $register = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);

                return true;
        }

        public function login($data){
                $credentials = [
                        'email' => $data['email'],
                        'password' => $data['password'],
                    ];
                    
                    try{
                            if (Auth::attempt($credentials)) {
                                $user = Auth::user();
                                $msg = "success";
                                $msg_type = "success";
                                $redirectToPage = (Auth::user()->user_type == "user") ? "/user/dashboard" : "/admin/dashboard";
                            } else {
                                $msg = "You have entered wrong Credentials";
                                $msg_type = "error";
                                $redirectToPage = "/";
                            }
                            
                            $res = [
                                'msg' => $msg,
                                'msg_type' => $msg_type,
                                'redirectToPage' => $redirectToPage,
                            ];

                            return $res;
                    }catch(\Exception $e){
                         dd($e->getMessage());
                    }
        }

        public function logout(){
            Auth::logout(); 
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return true;
        }
}