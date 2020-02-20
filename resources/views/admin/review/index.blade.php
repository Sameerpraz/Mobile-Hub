@extends('admin.app')

@section('title')
Reviews
@endsection

@section('content')

	<h3 class="page-title">Reviews <a href="{{ route('reviews.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Title</th>
				{{--<th>Rating</th>--}}
				<th>Status</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reviews as $review)			
			<tr>
				<td>@if($review->image)<img src="{{ asset('uploads/reviews/' . $review->image) }}" alt="{{ $review->name }}" width="80"> @else<img src="{{ asset('public/uploads/reviews/default_user.png')}}" width="80"/> @endif</td>
				<td>{{ $review->name }} </td>
				<td>{{ $review->title }}</td>
				{{--<td>{{ $review->rating}}</td>--}}
				<td>
					@if (!$review->status)
						<a class="text-success" data-toggle="tooltip" data-placement="bottom" title="Click to hide" href="{{ route('reviews.approve', $review->id) }}">
							<i class="lnr lnr-checkmark-circle"></i>
							Active
						</a>
					@else
						<a class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Click to show" href="{{ route('reviews.cancel', $review->id) }}">
							<i class="lnr lnr-cross-circle"></i>
							Draft
						</a>
					@endif
					{{--{{ $review->status && $review->status==1?'approved':'pending'}}</td>--}}
				<td>{{ $review->created_at}}</td>
				<td class="text-right">			
					{{--@if(!$review->status)--}}
					{{--<a class="btn btn-success btn-sm" href="{{ route('reviews.approve', $review->id) }}"><i class="lnr lnr-checkmark-circle"></i></a>--}}
					{{--@else--}}
					{{--<a class="btn btn-info btn-sm" href="{{ route('reviews.cancel', $review->id) }}"><i class="lnr lnr-cross-circle"></i></a>--}}
					{{--@endif--}}
					<a class="btn btn-primary btn-sm" href="{{ route('reviews.edit', $review->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('reviews.destroy', $review->id) }}" method="post">
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