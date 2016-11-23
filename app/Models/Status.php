<?php

namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
		'body',
	];

	public function user(){
		return $this->belongsTo('Chatty\Models\User');
	}
}
