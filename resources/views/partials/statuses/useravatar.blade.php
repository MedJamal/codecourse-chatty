<a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
	<img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }}">
</a>