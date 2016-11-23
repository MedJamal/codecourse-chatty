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