@if (session()->has('errors'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
		You should check in on some of those fields below.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>

	  	<strong>
		{!! session()->get('errors') !!}
		</strong>
</div>
@endif
