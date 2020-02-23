@extends('layouts.master')

@section('title')
    Best Selling Items
@endsection
@section('content')

<section class="index_section_wrap mt-md-5">
        <div class="container">
            <div class="row">
            
           
                @foreach($bestsellers as $bestseller)
                <div class="col-md-4">
            <div class="card" style="width: 18rem;">
            @if($bestseller->image)
            <img class="card-img-top" src="{{url('public/uploads/items/'.$bestseller->image)}}" alt="{{$bestseller->title}}">
            @endif               
                <div class="card-body">
                    <h5 class="card-title">{{$bestseller->title}}</h5>
                    <p class="card-text">Rs. {{round($bestseller->price,2)}}</p>
                    <a href="{{route('item.display',$bestseller->slug)}}" class="btn btn-primary">Detail</a>
                </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection