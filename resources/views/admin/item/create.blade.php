@extends('admin.app')

@section('title')
Add Items
@endsection

@section('content')

<h1>Add Items <a href="{{ route('items.index') }}" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> <span>Back</span></a></h1>

<hr>

<div class="content-form">
	<form class="form-horizontal" action="{{ route('items.store') }}" accept-charset="utf-8" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}

		@include('admin.item.form')
		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>		
		</div>	
	</form>
</div>
@endsection