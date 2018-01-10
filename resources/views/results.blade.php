@extends('layouts.base')

@section('title', "Search '{$keyword}'")

@section('content')
	<h3>Your search for "{{ $keyword }}"</h3>

	<div class="row">
		<div class="col-lg-12">
			@forelse($users as $user)
				@include('partials.userblock')
			@empty
				<p>No results found, sorry.</p>
			@endforelse
		</div>
	</div>
@stop
