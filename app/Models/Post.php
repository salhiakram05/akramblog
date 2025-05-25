<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','post','user_id','path'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }
    public function likes(){
        return $this->hasMany(Like::class) ;
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
