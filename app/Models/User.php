<?php

namespace Chatty\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
		'email',
		'password',
		'firstname',
		'lastname',
		'location',
    ];

    protected $hidden = [
        'password',
		'remember_token',
    ];

	public function getName($format = ':fn :ln'){
		if($this->firstname && $this->lastname){
			$placeholders = [
				':fn' => $this->firstname,
				// ':mn' => $this->middlename,
				// ':mi' => substr($this->middlename, 0, 1) . '.',
				':ln' => $this->lastname
			];

			$name = $format;

			foreach($placeholders as $placeholder => $replacement){
				$name = str_replace($placeholder, $replacement, $name);
			}

			return $name;
		}

		if($this->firstname){
			return $this->firstname;
		}

		return null;
	}

	public function getNameOrUsername(){
		return $this->getName() ?: $this->username; 
	}

	public function getFirstNameOrUsername(){
		return $this->firstname ?: $this->username; 
	}

	public function getAvatarUrl(){
		return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40"; 
	}

	public function friendsOfMine(){
		 return $this->belongsToMany('Chatty\Models\User', 'friends', 'user_id', 'friend_id');
	}

	public function friendOf(){
		 return $this->belongsToMany('Chatty\Models\User', 'friends', 'friend_id', 'user_id');
	}

	public function friends(){
		 return $this->friendsOfMine()->wherePivot('accepted', true)->get()
		 	->merge($this->friendOf()->wherePivot('accepted', true)->get());
	}
}