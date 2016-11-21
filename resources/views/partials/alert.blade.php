@if(Session::has('alert'))
	<div class="alert alert-info">
		{{ Session::get('alert') }}
	</div>
@endif