@extends('layouts.master')

@section('title')
    New Arrivals
@endsection
@section('content')
<section class="index_section_wrap mt-md-5">
        <div class="container">
            <div class="row">
            
           
                @foreach($newarrivals as $newarrival)
                <div class="col-md-4">
            <div class="card" style="width: 18rem;">
            @if($newarrival->image)
            <img class="card-img-top" src="{{url('public/uploads/items/'.$newarrival->image)}}" alt="{{$newarrival->title}}">
            @endif               
                <div class="card-body">
                    <h5 class="card-title">{{$newarrival->title}}</h5>
                    <p class="card-text">Rs. {{round($newarrival->price,2)}}</p>
                    <a href="{{route('item.display',$newarrival->slug)}}" class="btn btn-primary">Detail</a>
                </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection