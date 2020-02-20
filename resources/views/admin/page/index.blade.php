@extends('admin.app')

@section('title')
Pages
@endsection

@section('content')
	<h3 class="page-title">Pages <a href="{{ route('pages.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>

<div class="content-table">

{{--	<form action="">--}}
{{--		<div class="form-group">--}}
{{--			<div class="col-sm-3">--}}
{{--				<input type="text" name="keyword" value="{{ request()->keyword }}" placeholder="Keyword" class="form-control">--}}
{{--			</div>--}}
{{--			<button type="submit" class="btn btn-primary">Search</button>--}}
{{--		</div>--}}
{{--	</form>--}}

	<hr>
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>S.N.</th>
				<th>Parent</th>
				<th>Title</th>
{{--				<th>Url</th>--}}
				<th>Created At</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pages as $key=>$page)
			<tr>
				<td>{{++$key}}</td>
				<td>{{ $page->parent ? $page->parent->title : 'None' }}</td>
				<td>{{ $page->title }}</td>
{{--				<td>{{ $page->slug == '/' ? '_root_' : '/' . $page->slug }}</td>--}}
				<td>{{ $page->created_at->format('M d, Y') }}</td>
				<td class="text-right">

						<a class="btn btn-primary btn-sm" href="{{ route('pages.edit', $page->id) }}"><i class="lnr lnr-pencil"></i></a>

						<div class="pull-right" style="margin-left: 10px;">
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('pages.destroy', $page->id) }}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger btn-sm" {{ $page->slug == '/' ? 'disabled=disabled':null }}><i class="lnr lnr-trash"></i></button>
							</form>
						</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<hr>
	{{ $pages->links() }}
</div>
@endsection
