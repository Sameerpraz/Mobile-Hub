@extends('admin.app')

@section('title')
Settings
@endsection

@section('content')

@if(count($logos) > 0)
	<h4>Logo</h4>
	@foreach($logos as $logo)
		<img src="{{ asset('uploads/logo/'.$logo->value) }}" height="100" width="150">
	@endforeach
	<form method="POST" action="{{ route('change.logo') }}" enctype="multipart/form-data" class="mt-2">
		{{ csrf_field() }}
		<div class="logo-add">
			<input type="file" name="logo" onclick="myFunction()">
			<button type="submit" id="submit-btn" style="display: none;"> Submit</button>
		</div>
	</form>
@else
	<img src="{{ asset('images/logo.png') }}" height="100" width="150">
	<form method="POST" action="{{ route('change.logo') }}" enctype="multipart/form-data" class="mt-2">
		{{ csrf_field() }}
		<div class="logo-add">
			<input type="file" name="logo" onclick="myFunction()">
			<button type="submit" id="submit-btn" style="display: none;"> Submit</button>
		</div>
	</form>
@endif
<br>
@if(count($headerbgs) > 0)
	<h4>Header Bg</h4>
	@foreach($headerbgs as $headerbg)
		<img src="{{ asset('uploads/headerbg/'.$headerbg->value) }}" height="100" width="150">
	@endforeach
	<form method="POST" action="{{ route('change.headerbg') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="logo-add">
			<input type="file" name="headerbg" onclick="myFunctions()">
			<button type="submit" id="submit-btns" style="display: none;"> Submit</button>
		</div>
	</form>
@else
	<img src="{{ asset('image/header_bg.jpg') }}" height="100" width="150">
	<form method="POST" action="{{ route('change.headerbg') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="logo-add">
			<input type="file" name="headerbg" onclick="myFunctions()">
			<button type="submit" id="submit-btns" style="display: none;"> Submit</button>
		</div>
	</form>
@endif
<br>
@if(count($parallaxbgs) > 0)
	<h4>Parallax Bg</h4>
	@foreach($parallaxbgs as $parallaxbg)
		<img src="{{ asset('uploads/parallaxbg/'.$parallaxbg->value) }}" height="100" width="150">
	@endforeach
	<form method="POST" action="{{ route('change.parallaxbg') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="logo-add">
			<input type="file" name="parallaxbg" onclick="myFunctioned()">
			<button type="submit" id="submit-btnss" style="display: none;"> Submit</button>
		</div>
	</form>
@else
	<img src="{{ asset('image/parallax_bg.jpg') }}" height="100" width="150">
	<form method="POST" action="{{ route('change.parallaxbg') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="logo-add">
			<input type="file" name="parallaxbg" onclick="myFunctioned()">
			<button type="submit" id="submit-btnss" style="display: none;"> Submit</button>
		</div>
	</form>
@endif
<br>
<h3 class="page-title">Setting <a href="{{ route('settings.create') }}" class="btn btn-primary pull-right"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a></h3>


<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Value</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($settings as $setting)
			<tr>
				<td>{{ $setting->title }}</td>
				<td>{{ str_limit($setting->value, 35) }}</td>
				<td>{{ $setting->created_at->format('M d, Y') }}</td>
				<td class="text-right">

						<a class="btn btn-primary btn-sm" href="{{ route('settings.edit', $setting->id) }}"><i class="lnr lnr-pencil"></i></a>

						<div class="pull-right" style="margin-left: 10px;">
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('settings.destroy', $setting->id) }}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
							</form>
						</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('script')
	{{--Logo--}}
	<script type="text/javascript">
		function myFunction() {
		  var x = document.getElementById("submit-btn");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}
//		Headerbg
		function myFunctions() {
			var x = document.getElementById("submit-btns");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
		//		Parallaxbg
		function myFunctioned() {
			var x = document.getElementById("submit-btnss");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
	</script>





@endsection