<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'commenter', 'comment'];
    //public function post(){
    //    return $this->belongsTo(Post::class);
   // }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
