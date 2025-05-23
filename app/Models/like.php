<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable = ['post_id','user_id'];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
