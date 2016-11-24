<?php

namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
		'body',
		'user_id',
	];

	public function user(){
		return $this->belongsTo('Chatty\Models\User');
	}

	public function replies(){
		return $this->hasMany('Chatty\Models\Status', 'parent_id');
	}

	public function likes(){
		return $this->morphMany('Chatty\Models\Like', 'likeable');
	}

	public function scopeNotReply($query){
		return $query->whereNull('parent_id');
	}
}
