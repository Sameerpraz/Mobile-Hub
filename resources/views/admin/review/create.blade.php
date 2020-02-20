@extends('admin.app')

@section('title')
Add Review
@endsection

@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if(Session::has('success'))
		<div class="alert alert-info">
			{{ Session::get('success') }}
		</div>
	@endif
<div class="content-form">
	<form class="form-horizontal" action="{{ route('reviews.store') }}" accept-charset="utf-8" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		@include('admin.review.form')
		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>		
		</div>	
	</form>
</div>
@endsection