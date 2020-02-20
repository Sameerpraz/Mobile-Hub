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
        {{--Videos--}}
        <section class="index_video_wrap mt-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <h4 class="text-center Content_title">
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