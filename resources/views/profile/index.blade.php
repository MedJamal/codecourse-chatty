@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="col-lg-5">
			@include('partials.userblock')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			<h4>{{ $user->getFirstNameOrUsername() }}'s friends.</h4>

			@forelse($user->friends() as $user)
				@include('partials.userblock')
			@empty
				<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
			@endforelse
		</div>
	</div>
@stop