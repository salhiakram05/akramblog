<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class SearchController extends Controller
{
    public function show(Request $request){
        $request->validate([
            'search' => ['required' ,'min:3' , 'string']
        ]);
        $keywords = explode(' ', $request->search);
        $results = Post::query();

        foreach ($keywords as $word) {
            $results->orWhere('title', 'like', "%$word%");
        }

        $posts = $results->with(['user', 'tags', 'comments'])->latest()->get();
        if($posts->isEmpty()){
            return back()->withErrors(['search' => 'there is no posts with this keywords'])->withInput();
        }
        
        return view('posts.search' ,['posts' => $posts]);
    }
}
