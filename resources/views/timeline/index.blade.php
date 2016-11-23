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
					<a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
						<img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }}">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a>
						</h4>
						<p>{{ $status->body }}</p>
						<ul class="list-inline">
							<li>{{ $status->created_at->diffForHumans() }}</li>
							@if($status->user->id !== Auth::id())
								<li><a href="#">Like</a></li>
							@endif
							{{-- <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li> --}}
						</ul>
						{{--
						@include('partials.statusreplies')
						--}}
						<form action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
							<div class="form-group {{ $errors->has("reply-{$status->id}") ? 'has-error' : '' }}">
								<textarea name="reply-{{ $status->id }}" rows="2" class="form-control" placeholder="Reply to this status"></textarea>
								@if($errors->has("reply-{$status->id}"))
									<span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
								@endif
							</div>
							<input type="submit" value="Reply" class="btn btn-default btn-sm">
							{!! csrf_field() !!}
						</form>
					</div>
				</div>
			@empty
				<p>There's nothing in your timeline, yet.</p>
			@endforelse

			{!! $statuses->render() !!}
		</div>
	</div>
@stop