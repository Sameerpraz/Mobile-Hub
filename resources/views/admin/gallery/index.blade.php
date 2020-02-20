@extends('admin.app')

@section('title')
Galleries
@endsection

@section('content')
	<h3 class="page-title">Gallery

		<a href="{{ route('galleries.create') }}" class="btn btn-primary pull-right"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
	</h3>


<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Caption</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($galleries as $gallery)			
			<tr>
				<td><img src="{{ asset('uploads/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="80"></td>
				<td>{{ $gallery->image_caption }}</td>
				<td>{{ $gallery->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('galleries.edit', $gallery->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('galleries.destroy', $gallery->id) }}" method="post">
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