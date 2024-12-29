<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\{Post, Comment};

class UserPostService{
      public function post(){
            $posts = Post::where('author', Auth::user()->id)->with(['comments'])->orderBy('id', 'desc')->paginate(10);
            return $posts;
      }

      public function post_save($data){
             Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'author' => Auth::user()->id,
             ]);

             return true;
      }

      public function post_delete($postId){
              Post::find($postId)->delete();
              return true;
      }

      public function post_edit($postId){
             $post = Post::find($postId);
             return $post;
      }

      public function post_update($data, $postId){
        Post::whereId($postId)->update([
           'title' => $data['title'],
           'content' => $data['content'],
        ]);

        return true;
    }

    public function viewAllComments($postId){
           $post = Post::whereId($postId)->with(['user', 'comments', 'comments.user'])->first();
           return $post;
    }
   
    public function saveComments($data, $postId){
            Comment::create([
                'comment' => $data['comment'],
                'user_id' => Auth::user()->id,
                'post_id' => $postId
            ]);

            return true;
    }

    public function deleteComment($commentId){
            Comment::find($commentId)->delete();
            return true;
    }

    public function updateComments($data, $comment){
            Comment::whereId($comment)->update([
                'comment' => $data['comment']
            ]);

            return true;
    }
}