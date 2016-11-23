@extends('layouts.base')

@section('title', "Friends | ")

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<h3>Your friends</h3>
			
			@forelse($friends as $user)
				@include('partials.userblock')
			@empty
				<p>You have no friends.</p>
			@endforelse
		</div>
		<div class="col-lg-6">
			<h4>Friend requests</h4>
			
			@forelse($requests as $user)
				@include('partials.userblock')
			@empty
				<p>You have no friend requests.</p>
			@endforelse
		</div>
	</div>
@stop