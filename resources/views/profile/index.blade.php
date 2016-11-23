@extends('layouts.base')

@section('title', "{$user->getNameOrUsername()} | ")

@section('content')
	<div class="row">
		<div class="col-lg-5">
			@include('partials.userblock')
			<hr>

			@forelse($statuses as $status)
				<div class="media">
					<a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
						<img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }}">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a>
						</h4>
						<p>{{ $status->body }}</p>
						<ul class="list-inline">
							<li>{{ $status->created_at->diffForHumans() }}</li>
							@if($status->user->id !== Auth::id())
								<li><a href="#">Like</a></li>
							@endif
							{{-- <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li> --}}
						</ul>

						@include('partials.statusreplies')

						@if($authUserIsFriend || Auth::id() === $status->user->id)
							<form action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
								<div class="form-group {{ $errors->has("reply-{$status->id}") ? 'has-error' : '' }}">
									<textarea name="reply-{{ $status->id }}" rows="2" class="form-control" placeholder="Reply to this status"></textarea>
									@if($errors->has("reply-{$status->id}"))
										<span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
									@endif
								</div>
								<input type="submit" value="Reply" class="btn btn-default btn-sm">
								{!! csrf_field() !!}
							</form>
						@endif
					</div>
				</div>
			@empty
				<p>{{ $user->getFirstNameOrUsername() }} hasn't posted anything yet.</p>
			@endforelse
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