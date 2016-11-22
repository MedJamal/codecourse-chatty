<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a href="{{ route('home') }}" class="navbar-brand">{{ config('app.name') }}</a>
		</div>
		<div class="collapse navbar-collapse">
			@if(Auth::check())
				<ul class="nav navbar-nav">
					<li><a href="{{ route('home') }}">Timeline</a></li>
					<li><a href="{{ route('friends.index') }}">Friends</a></li>
				</ul>
				<form action="{{ route('search.results') }}" class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" name="keyword" placeholder="Find people">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>
			@endif
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
					<li><a href="{{ route('profile.edit') }}">Update Profile</a></li>
					<li><a href="{{ route('auth.signout') }}">Sign Out</a></li>
				@else
					<li><a href="{{ route('auth.signup') }}">Sign Up</a></li>
					<li><a href="{{ route('auth.signin') }}">Sign In</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>