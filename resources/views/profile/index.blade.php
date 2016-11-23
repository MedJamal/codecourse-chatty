@extends('layouts.base')

@section('title', "{$user->getNameOrUsername()} | ")

@section('content')
	<div class="row">
		<div class="col-lg-5">
			@include('partials.userblock')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			@if(Auth::user()->hasFriendRequestPending($user))
				<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>
			@elseif(Auth::user()->hasFriendRequestReceived($user))
				<a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">
					Accept friend request
				</a>
			@elseif(Auth::user()->isFriendsWith($user))
				<p>You and {{ $user->getNameOrUsername() }} are friends.</p>
			@elseif(Auth::id() !== $user->id)
				<a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">
					Add as friend
				</a>
			@endif
		
			<h4>{{ $user->getFirstNameOrUsername() }}'s friends.</h4>

			@forelse($user->friends() as $user)
				@include('partials.userblock')
			@empty
				<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
			@endforelse
		</div>
	</div>
@stop