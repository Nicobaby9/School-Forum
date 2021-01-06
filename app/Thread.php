<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\{User, Feed, Tag_Thread};
use App\Model\{Comment, Like, Tag};

class Thread extends Model
{   
    use Traits\CommentableTrait;

    protected $fillable = ['subject', 'thread', 'user_id'];

    public static function boot() {
    	parent::boot();

    	static::created(function($thread) {
    		$thread->activityFeed('created');
    	});

    	static::deleted(function($thread) {
    		$thread->activityFeed('deleted');
    	});

    	static::updated(function($thread) {
    		$thread->activityFeed('updated');
    	});
    }

    public function activityFeed($event) {
    	$this->feeds()->create([
    		'user_id' => auth()->id(),
    		'type' => $event.'_'.strToLower(class_basename($this)),
    	]);
    }

    public function feeds() {
    	return $this->morphMany(Feed::class, 'feedable');
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function tags() {
    	return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
