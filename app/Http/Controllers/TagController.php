<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag){
        $posts = $tag->posts()->with(['user' , 'tags', 'comments'])->latest()->get();
        return view('posts.tagged' , ['posts' => $posts] );
    }
}
