@extends('layouts.base')

@section('title', "Sign in")

@section('content')
	<h3>Sign in</h3>

	<div class="row">
		<div class="col-lg-6">
			<form class="form-vertical" method="post" action="{{ route('auth.signin') }}">

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">Email</label>
					<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
					@if($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					@if($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> Remember me
					</label>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Sign in</button>
				</div>

				{!! csrf_field() !!}
			</form>
		</div>
	</div>
@stop
