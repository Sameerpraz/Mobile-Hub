@extends('admin.app')

@section('title')
Order Details [#{{$order->id}}]
@endsection

@section('content')

<h3 class="page-title">Order Details</h3>

<div class="panel">
	<div class="panel-heading">
        <h3 class="panel-title">Order Details [#{{$order->id}}]</h3>
    </div>
	<div class="panel-body">		
		<p>
			<b>Order Type:</b> {{$order->type}} <br>
			<b>Payment Type:</b> {{$order->payment}}({!!$order->paid? '<span class="text-success">Paid</span>' : '<span class="text-danger">Unpaid</span>'!!}) <br>
			<b>Delivery Date & Time:</b> {{$order->date_time}} <br>
			<b>Name:</b> {{$order->name}}<br>
			<b>Address:</b> {{$order->address}}<br>
			<b>Phone:</b> {{$order->phone}}<br>
			<b>Email:</b> {{$order->email}}<br>
		</p>
		<br>

		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Item</th>
						<th class="text-right">Qty</th>
						<th class="text-right">Price</th>
						<th class="text-right">Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($order->items as $item)
					<tr>
						<td>{{$item->item}}</td>
						<td class="text-right">{{$item->qty}}</td>
						<td class="text-right">Rs.{{$item->price}}</td>
						<td class="text-right">Rs.{{$item->total}}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="3" class="text-right">Total</td>
						<td class="text-right">Rs.{{$order->total}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>	
</div>
@endsection

