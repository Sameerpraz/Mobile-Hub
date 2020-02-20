@extends('admin.app')

@section('title')
Milk Subscription
@endsection

@section('content')

<div class="back">
	<a href="{{ route('milks.index') }}" class="btn btn-primary pull-right"><span>Back</span></a>
</div>

<div class="content-table">
	<div class="row">
		<div class="col-md-6">
			<div>
				<label>Name:</label>
				<p>{{ $milk->name }}</p>
			</div>

			<div>
				<label>Email:</label>
				<p>{{ $milk->email }}</p>
			</div>

			<div>
				<label>Phone No:</label>
				<p>{{ $milk->phone }}</p>
			</div>


			<div>
				<label>Address:</label>
				<p>{{ $milk->address ? $milk->address : '-' }}</p>
			</div>



			<div>
				<label>Subscription Type:</label>
				<p>{{ $milk->subscription_type }}</p>
			</div>



			<div>
				<label>Option(Volume):</label>
				<p>{{ $milk->options }}</p>
			</div>

			<div>
				<label>Quantity:</label>
				<p>{{ $milk->quantity }}</p>
			</div>


		</div>

		<div class="col-md-6">
			<div>
				<p><img src="{{ asset('uploads/milk/'. $milk->image) }}" width="350"></p>
			</div>
		</div>
	</div>
</div>
@endsection