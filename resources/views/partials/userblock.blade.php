<div class="media">
	<a href="#" class="pull-left">
		<img src="{{ $user->getAvatarUrl() }}" alt="{{ $user->getNameOrUsername() }}" class="media-object">
	</a>
	<div class="media-body">
		<h4 class="media-heading">
			<a href="#">{{ $user->getNameOrUsername() }}</a>
		</h4>
		@if($user->location)
			<p>{{ $user->location }}</p>
		@endif
	</div>
</div>