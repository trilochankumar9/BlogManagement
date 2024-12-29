<?php

namespace App\Services;
use App\Models\Post;

class UserService{
        public function dashboard(){
               $posts = Post::with(['comments', 'user'])->orderBy('id', 'desc')->paginate(20);
               return $posts;
        }
}