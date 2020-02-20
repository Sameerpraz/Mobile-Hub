@extends('admin.app')

@section('title')
Videos
@endsection

@section('content')

	<h3 class="page-title">Videos <a href="{{ route('videos.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>


<div class="content-table">
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>S.N.</th>
				<th>Title</th>
				<th>Link</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($videos as $key=>$video)
			<tr>
				<td>{{++$key}}</td>
				<td>{{ $video->title }}</td>
				<td>{{ $video->link }}</td>
				<td>{{ $video->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('videos.edit', $video->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('videos.destroy', $video->id) }}" method="post">
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
</div>
@endsection