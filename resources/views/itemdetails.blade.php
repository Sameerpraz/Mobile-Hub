@extends('layouts.master')

@section('title')
    {{$item->title}}::{{$item->category_title}} - Mobile Zone
@endsection
@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				@if($item->image)
    			<img src="{{url('public/uploads/items/'.$item->image)}}" alt="" style="width: 720px; height: 350px;">
				@endif  
			</div>
			<div class="col-md-5 bg-light">
				<h3>{{$item->title}}</h3>
				<p>Price: Rs. {{$item->price}}</p>
				<span>{!! $item->details !!}</span>
			</div>
		</div>
	</div>
</div>   
@endsection