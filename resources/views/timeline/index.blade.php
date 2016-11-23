@extends('layouts.base')

@section('title', "Timeline | ")

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<form action="#" method="post">
				<div class="form-group">
					<textarea placeholder="What's up {{ Auth::user()->getFirstNameOrUsername() }}?" name="status" class="form-control" rows="2"></textarea>
				</div>
				<button type="submit" class="btn btn-default">Update status</button>
			</form>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-5">
			
		</div>
	</div>
@stop