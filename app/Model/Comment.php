<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Comment;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function commentable() {
    	return $this->morphTo();
    }

    public function comments() {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
