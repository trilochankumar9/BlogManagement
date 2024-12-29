<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{userService};

class UserManageController extends Controller
{
    //

    protected $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }

    public function dashboard(){
        $posts = $this->userService->dashboard();
        return view('user.dashboard', compact('posts'));
    }
}