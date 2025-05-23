<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['post_id', 'commenter', 'comment'];
    //public function post(){
    //    return $this->belongsTo(post::class);
   // }

}
