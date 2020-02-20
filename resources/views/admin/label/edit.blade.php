@extends('admin.app')

@section('title')
Edit Label
@endsection

@section('content')
<h3 class="page-title">Edit Label <a href="{{ route('labels.index') }}" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> <span>Back</span></a></h3>

<hr>

<div class="panel">
	<div class="panel-body">
		<form class="form-horizontal" action="{{ route('labels.update', $label->id) }}" accept-charset="utf-8" method="post">
			{{ method_field('PUT') }}
			{!! csrf_field() !!}

			@include('admin.label.form')
			
			<div class="form-group">
				<label class="col-sm-2 control-label">&nbsp;</label>
				<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>		
			</div>	
		</form>
	</div>
</div>
@endsection