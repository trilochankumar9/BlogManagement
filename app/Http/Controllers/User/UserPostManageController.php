<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{UserPostService};
use App\Models\{Comment};

class UserPostManageController extends Controller
{
    //

    protected $userPostService;

    public function __construct(UserPostService $userPostService)
    {
        $this->userPostService = $userPostService;
    }

    public function post(){
        $posts = $this->userPostService->post();
        return view('user.post.list', compact('posts'));
    }
    
    public function post_add(){
        return view('user.post.add');
    }
    
    public function post_save(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $posts = $this->userPostService->post_save($request->all());
        return redirect()->back()->with('success', 'Post Added Successfully');
    }
    
    public function post_delete($postId){
        $this->userPostService->post_delete($postId);
        return redirect('/user/post')->with('success', 'Post Deleted Successfully');
    }
    
    public function post_edit($postId){
        $post = $this->userPostService->post_edit($postId);
        return view('user.post.edit', compact('post'));
    }

    public function post_update(Request $request, $postId){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $posts = $this->userPostService->post_update($request->all(), $postId);
        return redirect('/user/post')->with('success', 'Post Updated Successfully');
    }

    /** Comments */

    public function viewAllComments($postId){
        $post = $this->userPostService->viewAllComments($postId);
        return view('user.comment.view-all', compact('post'));
    }
   
    public function addComments($postId){
        return view('user.comment.add', compact('postId'));
    }

    public function saveComments(Request $request, $postId){
        $request->validate([
            'comment' => 'required'
        ]);

        $post = $this->userPostService->saveComments($request->all(), $postId);
        return redirect('user/view-all-comments/'.$postId);
    }

    public function deleteComment($commentId){
        $post = $this->userPostService->deleteComment($commentId);
        return redirect()->back()->with('error', 'Comment Deleted Successfully');
    }

    public function editComments(Comment $comment){
        return view('user.comment.edit', compact('comment'));
    }

    public function updateComments(Request $request, $comment){
        $post = $this->userPostService->updateComments($request->all(), $comment);
        return redirect('user/view-all-comments/'.$request->postId)->with('success', 'Comment Updated Successfully');
    }
}