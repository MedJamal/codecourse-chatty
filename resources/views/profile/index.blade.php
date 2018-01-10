@extends('layouts.base')

@section('title', "{$user->getNameOrUsername()}")

@section('content')
	<div class="row">
		<div class="col-lg-5">
			@include('partials.userblock')
			<hr>

			@forelse($statuses as $status)
				<div class="media">
					@include('partials.statuses.useravatar')
					<div class="media-body">
						@include('partials.statuses.content')

						@if(Auth::check() && (Auth::user()->isFriendsWith($user) || Auth::id() === $user->id))
							@include('partials.statuses.replyform')
						@endif
					</div>
				</div>
				<hr>
			@empty
				<p>{{ $user->getFirstNameOrUsername() }} hasn't posted anything yet.</p>
			@endforelse
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			@if(Auth::check())
				@include('partials.friendactions')
			@endif {{-- check logged in --}}
		
			<h4>{{ $user->getFirstNameOrUsername() }}'s friends</h4>

			@forelse($user->friends() as $user)
				@include('partials.userblock')
			@empty
				<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
			@endforelse
		</div>
	</div>
@stop
