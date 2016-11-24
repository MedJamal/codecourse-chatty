@if(Auth::user()->hasFriendRequestPending($user))

	<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>

@elseif(Auth::user()->hasFriendRequestReceived($user))

	<a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-success">
		Accept friend request
	</a>

@elseif(Auth::user()->isFriendsWith($user))

	<p>You and {{ $user->getNameOrUsername() }} are friends.</p>

	<form action="{{ route('friends.delete', ['username' => $user->username]) }}" method="post">
		<input type="submit" value="Unfriend" class="btn btn-danger">
		{!! csrf_field() !!}
	</form>

@elseif(Auth::id() !== $user->id)

	<a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">
		Add as friend
	</a>

@endif