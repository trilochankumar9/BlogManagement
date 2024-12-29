<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{AdminService};

class AdminManageController extends Controller
{
    //

    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function dashboard(){
           $res = $this->adminService->dashboard();
           return view('admin.dashboard', compact('res'));
    }

    public function user_list(){
        $res = $this->adminService->user_list();
        return view('admin.user.user-list', ['users' => $res]);
    }
    
    public function user_delete($userId){
        $res = $this->adminService->user_delete($userId);
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
    
    public function user_edit($userId){
        $res = $this->adminService->user_edit($userId);
        return view('admin.user.user-edit', ['user' => $res]);
    }
    
    public function user_update(Request $request, $userId){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $res = $this->adminService->user_update($request->all(), $userId);
        return redirect()->back()->with('success', 'User Updated Successfully');
    }

    public function post(){
        $posts = $this->adminService->post();
        return view('admin.post.list', compact('posts'));
    }
    
    public function post_delete($postId){
        $posts = $this->adminService->post_delete($postId);
        return redirect()->back()->with('success', 'Post Deleted Successfully');
    }
}