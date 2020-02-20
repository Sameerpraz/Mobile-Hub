@extends('admin.app')

@section('title')
	Categories
@endsection

@section('content')

	<h1>Categories <a href="{{ route('categories.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h1>

	<div class="content-table">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>Parent</th>
				<th>Title</th>
{{--				<th>Url</th>--}}
				<th>Created At</th>
				<th></th>
			</tr>
			</thead>
			<tbody id="sortable">

			@foreach ($categories as $category)
				<tr id="{{$category->id}}">
					<td>{{ $category->parent_title }}</td>
					<td>{{ $category->title }}</td>
{{--					<td>{{ $category->slug == '/' ? '/' : '/' . $category->slug }}</td>--}}
					<td>{{ $category->created_at->format('M d, Y') }}</td>
					<td class="text-right">

						<a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>

						<div class="pull-right" style="margin-left: 10px;">
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('categories.destroy', $category->id) }}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

	<script>
		$( function() {
			$( "#sortable" ).sortable({
				update: function (event, ui) {
					var data = $(this).sortable('toArray');
					url = "{{ route('categories.order') }}";
					$.ajax(url, {
						data: {
							'_token': "{{ csrf_token() }}",
							'data':data
						},
						type: 'POST',
					});
				}
			});
		} );
	</script>
@endsection

