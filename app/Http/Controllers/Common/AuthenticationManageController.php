<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{AuthService};

class AuthenticationManageController extends Controller
{
    //

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index(){
           return view('Auth.login');
    }
        
    public function register(){
        return view('Auth.register');
    }

    public function register_submit(Request $request){
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            $res = $this->authService->registration($request->all());
            return redirect()->back()->with('success', 'You have Successfully Registered');
    }
    
    public function login(Request $request){
            // $request->validate([
            //     'email' => 'required|email|unique:users',
            //     'password' => 'required',
            // ]);

            $res = $this->authService->login($request->all());
            return redirect($res['redirectToPage'])->with($res['msg_type'], $res['msg']);
    }

    public function logout(){
           $res = $this->authService->logout();
           return redirect('/')->with('success', 'Logout Successfully');
    }
}