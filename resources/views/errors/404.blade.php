@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="jumbotron text-center">
			<h1>404 Error</h1>
			<p class="text-danger">The resource you were trying to access could not be found.</p>
			<a href="{{ route('home') }}" class="btn btn-primary btn-lg">Go to home page</a>
		</div>
	</div>
@stop
