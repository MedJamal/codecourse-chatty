@extends('layouts.base')

@section('title', "Update your profile")

@section('content')
	<h3>Update your profile</h3>

	<div class="row">
		<div class="col-lg-6">
			<form class="form-vertical" method="post" action="{{ route('profile.edit') }}">

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
							<label for="firstname" class="control-label">Firstname</label>
							<input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') ?: Auth::user()->firstname }}">
							@if($errors->has('firstname'))
								<span class="help-block">{{ $errors->first('firstname') }}</span>
							@endif
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
							<label for="lastname" class="control-label">Lastname</label>
							<input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') ?: Auth::user()->lastname }}">
							@if($errors->has('lastname'))
								<span class="help-block">{{ $errors->first('lastname') }}</span>
							@endif
						</div>
					</div>
				</div>

				<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
					<label for="location" class="control-label">Location</label>
					<input type="text" name="location" id="location" class="form-control" value="{{ old('location') ?: Auth::user()->location }}">
					@if($errors->has('location'))
						<span class="help-block">{{ $errors->first('location') }}</span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Update</button>
				</div>
				{!! csrf_field() !!}
			</form>
		</div>
	</div>
@stop
