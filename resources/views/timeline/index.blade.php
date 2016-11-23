@extends('layouts.base')

@section('title', "Timeline | ")

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<form action="{{ route('status.post') }}" method="post">
				<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
					<textarea placeholder="What's up {{ Auth::user()->getFirstNameOrUsername() }}?" name="status" class="form-control" rows="2"></textarea>
					@if($errors->has('status'))
						<span class="help-block">{{ $errors->first('status') }}</span>
					@endif
				</div>
				<button type="submit" class="btn btn-default">Update status</button>
				{!! csrf_field() !!}
			</form>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-5">
			@forelse($statuses as $status)
				<div class="media">
					@include('partials.statuses.useravatar')
					<div class="media-body">
						@include('partials.statuses.content')

						@include('partials.statuses.replyform')
					</div>
				</div>
				<hr>
			@empty
				<p>There's nothing in your timeline, yet.</p>
			@endforelse

			{!! $statuses->render() !!}
		</div>
	</div>
@stop