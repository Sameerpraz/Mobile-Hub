@extends('admin.app')

@section('title')
Add Category
@endsection

@section('content')

<h1>Add Category <a href="{{ route('categories.index') }}" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> <span>Back</span></a></h1>

<hr>

<div class="content-form">
	<form class="form-horizontal" action="{{ route('categories.store') }}" accept-charset="utf-8" method="post">
		{!! csrf_field() !!}

		@include('admin.category.form')
		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>		
		</div>	
	</form>
</div>
@endsection