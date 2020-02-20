@extends('admin.app')

@section('title')
Milk Subscription
@endsection

@section('content')
	<h3 class="page-title">Milk Subscription</h3>
	<br>
<div class="content-table">
	<table class="table table-hover">
		<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Contact No</th>
				<th>Address</th>
				<th>Subscription Type</th>
				<th>Status</th>
				<th></th>
		</thead>
		<tbody>
			@if(count($milks) > 0)
				@foreach ($milks as $milk)
				<tr>
					<td>{{ $milk->name }}</td>
					<td>{{ $milk->email }}</td>
					<td>{{ $milk->phone }}</td>
					<td>{{ $milk->address}}</td>
					<td>{{$milk->subscription_type}}</td>
					<td>
						@if($milk->status == 0)
							<div class="pull-left" style="margin-right: 20px;">
								<form class="form-group" action="{{ route('milk.approve',encrypt($milk->id)) }}" method="post">
			        				{{csrf_field()}}
									<button type="submit" class="btn btn-success"><i class="lnr lnr-checkmark-circle"></i></button>
								</form>
							</div>

							<div class="pull-left" style="margin-right: 20px;">
								<form class="form-group" action="{{ route('milk.decline',$milk->id) }}" method="post">
			        				{{csrf_field()}}
									<button type="submit" class="btn btn-warning"><i class="lnr lnr-cross-circle"></i></button>
								</form>
							</div>
						@elseif($milk->status == 1)
							<p class="text-success"><i class="lnr lnr-checkmark-circle"></i> Approved </p>
						@else
							<p class="text-danger"><i class="lnr lnr-cross-circle"></i> Declined </p>
						@endif
					</td>
					<td class="text-right">
						<a class="btn btn-primary btn-sm" href="{{ route('card', encrypt($milk->id)) }}"><i class="lnr lnr-download"></i></a>
						<a class="btn btn-primary btn-sm" href="{{ route('milks.show', $milk->id) }}"><i class="lnr lnr-eye"></i></a>
						<div class="pull-right" style="margin-left: 10px;"> 
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('milks.destroy', $milk->id) }}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
							</form>
						</div>
					</td>
				</tr>			
				@endforeach
			@else
				<tr>
					<td>No Data Available</td>
				</tr>
			@endif
		</tbody>
	</table>
</div>
@endsection