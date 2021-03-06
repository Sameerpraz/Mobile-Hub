@extends('admin.app')

@section('title')
Orders
@endsection

@section('content')

<h3 class="page-title">Orders <a href="{{route('monthlyreport.generate')}}" class="btn btn-primary pull-right" style="margin-left: 5px;">Monthly Report</a><a href="{{route('weeklyreport.generate')}}" class="btn btn-primary pull-right" style="margin-left: 5px;">Weekly Report</a> <a href="{{route('dailyreport.generate')}}" class="btn btn-primary pull-right">Daily Report</a> </h3>
{{--<div class="container">--}}
	{{--<div class="row">--}}
		{{--<div class="col-sm-8">--}}

		{{--</div>--}}
		{{--<div class="col-sm-4 ">--}}
			{{----}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}

<div class="panel">
	<div class="panel-heading">
        <h3 class="panel-title">Today's orders</h3>
    </div>
	<div class="panel-body">		
		<table class="table">
			<thead>
				<tr>
					<th>#ordId</th>
					<th>Delivery date time</th>
					<th>Delivery type</th>
					<th>Payment</th>

					<th>Address</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($today_orders as $order)
				<tr>
					<td><a href="{{ route('orders.show', $order->id) }}">#{{$order->id}}</a></td>
					<td>{{ $order->date_time}}</td>
					<td>{{ $order->type }}</td>
					<td>{{$order->payment}}</td>
					<td>{{ $order->address }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->phone }}</td>
					<td>
						@if($order->paid == 0)
							<div class="pull-left" style="margin-right: 20px;">
								<form class="form-group" action="{{ route('order.application.approve',encrypt($order->id)) }}" method="post">
									{{csrf_field()}}
									<button type="submit" class="btn btn-success"><i class="lnr lnr-checkmark-circle"></i></button>
								</form>
							</div>

							<div class="pull-left" style="margin-right: 20px;">
								<form class="form-group" action="{{ route('order.application.decline',$order->id) }}" method="post">
									{{csrf_field()}}
									<button type="submit" class="btn btn-warning"><i class="lnr lnr-cross-circle"></i></button>
								</form>
							</div>
						@elseif($order->paid == 1)
							<p class="text-success"><i class="lnr lnr-checkmark-circle"></i> Paid </p>
						@else
							<p class="text-danger"><i class="lnr lnr-cross-circle"></i> Pending </p>
						@endif

					</td>
					{{--<td>{{ $order->order_status }}</td>--}}
					<td class="text-right">
						<a class="btn btn-primary btn-sm" href="{{ route('orders.show', $order->id) }}"><i class="fa fa-eye"></i></a>
						<div class="pull-right" style="margin-left: 10px;">
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('orders.destroy', $order->id) }}" method="post">
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
	<div class="panel-footer">{{$today_orders->links()}}</div>
</div>

<div class="panel">
	<div class="panel-heading">
        <h3 class="panel-title">All Orders
			<div class="search_box pull-right">
				<form action="" class="">
					<div class="form-group">
						<div class="col-sm-8">
							<input type="text" name="keyword" value="{{ request()->keyword }}" placeholder="Keyword" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary" style="background:#00AAFF; padding: 7px;">Search</button>
					</div>
				</form>
			</div>
		</h3>


    </div>
	<div class="panel-body">		
		<table class="table">
			<thead>
				<tr>
					<th>#ordId</th>
					<th>Delivery date time</th>
					<th>Delivery type</th>
					<th>Payment</th>
					<th>Address</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
				<tr>
					<td><a href="{{ route('orders.show', $order->id) }}">#{{$order->id}}</a></td>
					<td>{{ $order->date_time}}</td>
					<td>{{ $order->type }}</td>
					<td>{{$order->payment}}</td>
					<td>{{ $order->address }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->phone }}</td>
					<td>
						@if($order->paid == 0)
							<div class="pull-left" style="margin-right: 20px;">
								<form class="form-group" action="{{ route('order.application.approve',encrypt($order->id)) }}" method="post">
									{{csrf_field()}}
									<button type="submit" class="btn btn-success"><i class="lnr lnr-checkmark-circle"></i></button>
								</form>
							</div>

							<div class="pull-left" style="margin-right: 20px;">
								<form class="form-group" action="{{ route('order.application.decline',encrypt($order->id)) }}" method="post">
									{{csrf_field()}}
									<button type="submit" class="btn btn-warning"><i class="lnr lnr-cross-circle"></i></button>
								</form>
							</div>
						@elseif($order->paid == 1)
							<p class="text-success"><i class="lnr lnr-checkmark-circle"></i> Paid </p>
						@else
							<p class="text-danger"><i class="lnr lnr-cross-circle"></i> Pending </p>
						@endif

					</td>
					<td class="text-right">

							<a class="btn btn-primary btn-sm" href="{{ route('orders.show', $order->id) }}"><i class="fa fa-eye"></i></a>
						<div class="pull-right" style="margin-left: 10px;">
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('orders.destroy', $order->id) }}" method="post">
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
	<div class="panel-footer">{{$orders->links()}}</div>
</div>
@endsection

