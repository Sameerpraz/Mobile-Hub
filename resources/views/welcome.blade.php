@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
   
    <header>
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="{{asset('images/mobile.jpg')}}" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="header-content">
                        <div class="line"></div>
                        <h2>Welcome to Mobile zone</h2>
                        <h1>Please Place your order</h1>
                        <h4>We will deliver your product anytime any where</h4>
                    </div>
                </div>
             </div>
        </div>                    
        <div class="item">
            <img src="{{asset('images/mobile1.jpg')}}" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="header-content">
                        <div class="line animated bounceInLeft"></div>
                        <h2>Best Mobile Devices</h2>
                        <h1>Intelligent solutions</h1>
                        <h4>We help customers to shop for mobile devices in an efficient way</h4>
                    </div>
                </div>
             </div>
        </div>                
        <div class="item">
            <img src="{{asset('images/mobile2.jpg')}}" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="header-content">
                        <div class="line animated bounceInLeft"></div>
                        <h2>Best Mobile Devices</h2>
                        <h1>Your Shopping Destination</h1>
                        <h4>We help customers to shop for mobile devices in an efficient way.</h4>
                    </div>
                </div>
             </div>
        </div>
    </div>
</header>
    <main>

<!-- New Arrival -->
<div class="container-fluid bg-light">
    <div class="container bg-white">
    <h2>New Arrival</h2>        
        <div class="row">
            <div class="col-md-4">                
            </div>
            <div class="col-md-8 text-right">
                <a href="{{route('view.newarrival')}}" class="btn btn-primary">view all</a>
            </div>
        </div>
        <hr class="bg-dark">
        <div class="row">
            @foreach($newarrivals as $newarrival)
            <div class="col-md-3">
                 <div class="card mb-md-5">
            @if($newarrival->image)
            <img class="card-img-top" style="height: 200px;" src="{{url('public/uploads/items/'.$newarrival->image)}}" alt="{{$newarrival->title}}">
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
</div>
<!-- <section class="index_section_wrap mt-md-5">
        <div class="container">
            <div class="row">
                <h2>New Arrival</h2>
                <a href="{{route('view.newarrival')}}" class="btn btn-primary">view all</a>
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
    </section> -->
    <!-- Best SEller -->
    <div class="container-fluid bg-light">
        <div class="container bg-white">
            <h2>Best Seller</h2>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-12 text-right">
                    <a href="{{route('view.bestseller')}}" class="btn btn-primary">view all</a>
                </div>
                <hr class="bg-dark">
            </div>
            <div class="row">
                   @foreach($bestsellers as $bestseller)
                <div class="col-md-3">
            <div class="card mb-5">
            @if($bestseller->image)
            <img class="card-img-top" style="height: 200px;" src="{{url('public/uploads/items/'.$bestseller->image)}}" alt="{{$bestseller->title}}">
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
    </div>
<!--     <section class="index_section_wrap mt-md-5">
        <div class="container">
            <div class="row">
            <h2>Best Seller</h2>
            <a href="{{route('view.bestseller')}}" class="btn btn-primary">view all</a>
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
    </section> -->

        {{--Videos--}}
        <section class="index_video_wrap bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <h4 class="text-center Content_title mt-4">
                            Videos
                        </h4>

                    </div>
                </div>
                <div class="row">
                    @if($videos)
                        @foreach($videos as $video)
                    <div class="col-md-4 col-sm-12 col-12 mb-md-3 ">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                        @endforeach
                        @else
                        <p>No videos.</p>
                    @endif

                </div>
            </div>

        </section>
        {{--Videos End--}}
    </main>
    {{--Main End--}}


@endsection

@section('script')

    <script src="{{URL::asset('frontend/js/active.js')}}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    mouseDrag:false,
    autoplay:true,
    animateOut: 'slideOutUp',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
    </script>

@endsection