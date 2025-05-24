<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\auth;

class CommentController extends Controller{



    public function store(Post $post){
        if(!auth()->check()){
            return back()->withErrors('you need to login in so you can comment')->withInput();
        }
         request()->validate([
            'comment' => ['required' , 'min:3'],
        ]);
        
        $commenter = auth()->name();
        $comment = request()->comment;
        // make this data into our database
        comment::create([
           'commenter' => $commenter,
           'comment' =>  $comment,
           'post_id' => $post->id
        ]);
        return to_route('posts.show', ['post' => $post->id]) ;

    }
}
