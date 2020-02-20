@extends('admin.app')

@section('title')
Orders
@endsection

@section('content')

<h3 class="page-title">Orders</h3>

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
					<td>{{ $order->order_status }}</td>
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
        <h3 class="panel-title">All Orders</h3>
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
					<td>{{ $order->order_status }}</td>
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

