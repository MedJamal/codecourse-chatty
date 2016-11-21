@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="col-lg-5">
			@include('partials.userblock')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			friend requests
		</div>
	</div>
@stop