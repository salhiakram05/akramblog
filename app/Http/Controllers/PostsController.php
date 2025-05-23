<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\post;
use App\models\like;
use App\models\user;
use Illuminate\Support\Facades\Route;


class PostsController extends Controller
{
    public function index(){
        if(route::currentRouteName() == 'index'){
            $posts = Post::latest()->get();
            return view('index',['posts' => $posts]);
        }
        $user_id = auth()->id();
        $posts = Post::where('user_id',$user_id)->get();
        return view('posts.dashboard',['posts' => $posts]);
    }

    public function show(post $post){
        return view('posts.show' , ['post' => $post ]) ;
    }

    public function create(){

        $users = User::all();
        return view('posts.create' , ['users' => $users]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required' , 'min:3'],
            'post' => ['required' , 'min:3'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048']

        ]);
        $title = $request->title;
        $description = $request->post;
        $user_id = auth()->id();
        $image = $request->file('image');
        $customName = $user_id . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $customName, 'public');

        // make this data into our database
        Post::create([
           'title' => $title,
           'post' =>  $description,
           'user_id' => $user_id,
           'path' => 'images/' . $customName
        ]);
        return to_route('posts.index');
    }

    public function edit($id){
        $post = post::find($id);
        $users = user::all();
        return view('posts.edit', ['post' => $post , 'users' => $users] );
    }
    public function update($id){
        $title = request()->title;
        $post = request()->post;
        $user_id = auth()->id();
        $image = request()->file('image');
        $customName = $user_id . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $customName, 'public');
        Post::find($id)->update(
            [
                'title' => $title,
                'post' => $post,
                'path' => 'images/' . $customName
            ]
        );
        return to_route('posts.show' , $id);
    }

    public function destroy($id){
        $post = Post::find($id);
        $post -> delete();
        return to_route('posts.index');
    }

    public function like(Post $post){
        $user = auth()->user();
        if(is_null($user)){
            return back()->withErrors('please login so you can react');
        }
        $like = $post->likes()->where('user_id', $user->id)->first() ;
        if (!$like) {
            like::create([
                'user_id' => $user->id ,
                'post_id' => $post->id
            ]);
        }
        else{
            $like->delete();
        }
        
        return back();
    }
    
}
