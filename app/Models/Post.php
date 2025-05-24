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
        return $this->hasMany(comment::class)->latest();
    }
    public function likes(){
        return $this->hasMany(like::class) ;
    }
}
