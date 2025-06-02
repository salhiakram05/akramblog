<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Tag;
use App\Models\Comment;


class PostsController extends Controller
{


    public function index(){
        $posts = Post::with(['user', 'tags', 'comments'])->latest()->get();
        $tags = Tag::all();
        $recentComments = Comment::with('post')->latest()->take(5)->get();

        return view('index',['posts' => $posts , 'tags' => $tags , 'recentComments' => $recentComments]);
    }

    public function dashboard(){
        $user_id = auth()->id();
        $posts = Post::where('user_id',$user_id)->get();
        return view('posts.dashboard',['posts' => $posts]);
    }


    public function show(Post $post){
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'tags' => ['nullable','string']
        ]);
        $title = $request->title;
        $description = $request->post;
        $user_id = auth()->id();
        $image = $request->file('image');
        $customName =  time()  . '.' . $image->getClientOriginalExtension();
        
        $image->storeAs('images', $customName,'public');

        // make this data into our database
        $post = Post::create([
           'title' => $title,
           'post' =>  $description,
           'user_id' => $user_id,
           'path' => 'images/' . $customName
        ]);

        // tags processing
        $tags = explode(',', $request->tags) ;
        $tag_Ids = [];
        foreach ($tags as $tag){
            $tag = trim($tag);
            if ( empty($tag) ) continue;
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $tag_Ids[] = $tag->id ;
        }
        $post->tags()->sync($tag_Ids);
        return to_route('posts.show' , $post->id);
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post ] );
    }
    public function update(Post $post , Request $request){
        $title = $request->title;
        $postContent = $request->post;
        $user_id = $post->user_id;
        $image = $request->file('image');
        $customName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $customName, 'public');

        $post->update(
            [
                'title' => $title,
                'post' => $postContent,
                'path' => 'images/' . $customName
            ]
        );
        // tags updating
        
        $tags = explode(',', $request->tags) ;
        $tag_Ids = [];
        foreach ($tags as $tag){
            $tag = trim($tag);
            if ( empty($tag) ) continue;
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $tag_Ids[] = $tag->id ;
        }
        $post->tags()->sync($tag_Ids);
        return to_route('posts.show' , $post->id);
    }

    public function destroy($id){
        $post = Post::find($id);
        $post -> delete();
        return to_route('posts.dashboard');
    }

    public function like(Post $post){
        $user = auth()->user();
        if(is_null($user)){
            return back()->withErrors('please login so you can react');
        }
        $like = $post->likes()->where('user_id', $user->id)->first() ;
        if (!$like) {
            Like::create([
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
