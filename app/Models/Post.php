<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "posts";
    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'author', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            if ($post->isForceDeleting()) {
                $post->comments()->forceDelete();
            } else {
                $post->comments()->delete();
            }
        });
    }
}