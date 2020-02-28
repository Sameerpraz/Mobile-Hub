<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
     <!-- Basic -->
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Site Metas -->
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

   {{--Css--}}
    <link rel="stylesheet" href="{{asset('vendor/css/bootstrap.min.css')}}">

    {{--Owl Carousel--}}
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.carousel.min.css')}}">
    {{--External css--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{--responsive--}}
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    {{--Toastr--}}
    <link href="{{asset('vendors/toastr/toastr.min.css')}}">
    @yield('css')



    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <!-- Favicon -->
    {{--    <link rel="icon" href="img/core-img/favicon.ico">--}}

<!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('frontend/style.css')}}">

    {{--Font Awesome--}}
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<section class="header_wrap container-fluid p-0">
    <div class="top_header_wrap container-fluid p-0 bg-success">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 col-sm-6 col-12">
                </div>
                <div class="col-md-6 col-sm-12 Login_shopping_wrap">
                    <ul class="top_option_link list-inline">
                        @auth
                            <li class="list-inline-item dropdown">
                                <a href="#" data-toggle="dropdown"><span class="fa fa-user"></span> {{Auth::user()->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="right: 0;left: auto;">
                                    <li class="dropdown-menu-item auth-dropdown-item"><a style="" href="{{route('profile')}}" >  Profile</a></li>
                                    <li class="dropdown-menu-item auth-dropdown-item">
                                        <a style="" href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"> Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="list-inline-item"><a href="{{route('login')}}" class="">Login</a></li>
                            <li class="list-inline-item"><a href="{{url('register')}}" class="">Register</a></li>
                        @endauth
                        <li id="topcartload" class="list-inline-item">
                            <i class="fa fa-shopping-cart" style="color: white;"></i> <a href="{{route('orderdetails')}}" class=""> {{Cart::count()}} Item(s) Rs.{{number_format(Cart::subtotal(),2)}}</a>
                        </li>
                        <li class="list-inline-item"><a href="{{route('order')}}" class="btn btn-sm btn-primary rounded-0">Shop Now</a></li>
                    </ul>
                </div>

            </div></div>
    </div>
    {{--        <nav class="navbar navbar-expand-md  navbar-light" style="background-attachment: fixed;">--}}
    {{--            <div class="container">--}}
    {{--                <a href="/" class="navbar-brand text-warning font-weight-bold p-0 navbar_img_content" ><img src="{{ App\Setting::getLogo() }}" alt="" width="140px"></a>--}}
    {{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #007bff !important;">--}}
    {{--                    <span class="navbar-toggler-icon"></span>--}}
    {{--                </button>--}}
    {{--                <div class="collapse navbar-collapse text-center" id="collapsenavbar">--}}
    {{--                    <ul class="navbar-nav text-center ml-auto">--}}
    {{--                        @foreach ($main_menu as $link=>$menu)--}}
    {{--                            @if (is_array($menu))--}}
    {{--                                <li class="nav-item dropdown">--}}
    {{--                                    <a class="nav-link dropdown-toggle text-dark" href="{{ url($link) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"--}}
    {{--                                       aria-expanded="false">{{ $menu[$link] }}</a>--}}
    {{--                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
    {{--                                        @foreach ($menu['sub'] as $sub_link=>$sub_menu)--}}
    {{--                                            <a class="dropdown-item" href="{{ url($sub_link) }}">{{ $sub_menu }}</a>--}}
    {{--                                        @endforeach--}}
    {{--                                    </div>--}}
    {{--                                </li>--}}
    {{--                            @else--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link text-dark" href="{{ url($link) }}">--}}
    {{--                                        {{ $menu }}--}}
    {{--                                    </a>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}

    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </nav>/--}}


</section>
<header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <!-- Breaking News -->
                    <div class="col-12 col-sm-6">
                        <div class="breaking-news">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Hello World!</a></li>
                                    <li><a href="#">Welcome to Colorlib Family.</a></li>
                                    <li><a href="#">Hello Delicious!</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Top Social Info -->
                    <div class="col-12 col-sm-6">
                        <div class="top-social-info text-right">
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
{{--                                <ul>--}}
{{--                                    <li class="active"><a href="index.html">Home</a></li>--}}
{{--                                    <li><a href="#">About Us</a></li>--}}
{{--                                    <li><a href="#">Gallery</a></li>--}}
{{--                                    <li><a href="receipe-post.html">Products</a></li>--}}
{{--                                    <li><a href="receipe-post.html">Service</a></li>--}}
{{--                                    <li><a href="contact.html">Contact US</a></li>--}}
{{--                                </ul>--}}
                                <ul>
                                    @foreach ($main_menu as $link=>$menu)
                                        @if (is_array($menu))
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-dark" href="{{ url($link) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">{{ $menu[$link] }}</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    @foreach ($menu['sub'] as $sub_link=>$sub_menu)
                                                        <a class="dropdown-item" href="{{ url($sub_link) }}">{{ $sub_menu }}</a>
                                                    @endforeach
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link text-dark" href="{{ url($link) }}">
                                                    {{ $menu }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


</header>

@yield('content')

{{--Footer--}}
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-body-a">
                        <img src="{{asset('images/logo.png')}}" alt="">
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">The Company</h3>
                    </div>
                    <div class="w-body-a">
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Agent Admin</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">International sites</h3>
                    </div>
                    <div class="w-body-a">
                        <ul class="list-unstyled">
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="#">Venezuela</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="#">China</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="#">Hong Kong</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="#">Argentina</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="#">Singapore</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="#">Philippines</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Property</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Blog</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">MobileZone</span> All Rights Reserved.
                    </p>
                </div>
                <div class="credits">
                    Designed by <a href=""></a>
                </div>
            </div>
        </div>
    </div>
</footer>
{{--Footer End--}}

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

{{--JS--}}
<script src="{{asset('vendor/js/bootstrap.min.js')}}"></script>

{{--Owl CArousel--}}
<script src="{{asset('vendor/owl-carousel/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{asset('vendor/js/sticky-kit.js')}}"></script>
{{--lodash--}}
<script src="{{asset('vendors/lodash.min.js') }}"></script>
<script src="{{asset('vendors/loadingoverlay.min.js') }}"></script>
{{--Toastr--}}
<script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>


<script src="{{asset('js/script.js')}}"></script>

@yield('script')

<script>
    function topcartload() {
        url = "{{ route('topcartload') }}";
        $.ajax(url,{
            type: 'post',
            start: $('#topcartload').LoadingOverlay('show'),
            data: {
                _token: "{{csrf_token()}}"
            },
            success:function (response) {
                $('#topcartload').html(response);
                $('#topcartload').LoadingOverlay('hide');
            }
        });
    }

    function sidecartload() {
        url = "{{ route('sidecartload') }}";
        $.ajax(url,{
            type: 'post',
            start: $('#sidecartload').LoadingOverlay('show'),
            data: {
                _token: "{{csrf_token()}}"
            },
            success:function (response) {
                $('#sidecartload').html(response);
                $('#sidecartload').LoadingOverlay('hide');
            }
        });
    }
    function mobilecartload() {
        url = "{{ route('mobilecartload') }}";
        $.ajax(url,{
            type: 'post',
            start: $('#mobilecartload').LoadingOverlay('show'),
            data: {
                _token: "{{csrf_token()}}"
            },
            success:function (response) {
                $('#mobilecartload').html(response);
                $('#mobilecartload').LoadingOverlay('hide');
            }
        });
    }

    $(document).on('click', '.btn_add_to_cart', function(e){
        e.preventDefault();
        _form =  $(this).closest("form");
        _data =  _form.serialize();
        url = "{{ route('addtocart') }}";
        parent = $(this).closest(".order-menu-item");
        $.ajax(url,{
            type: 'post',
            data: _data,
            start: parent.LoadingOverlay('show'),
            success:function (response) {
                topcartload();
                sidecartload();
                mobilecartload();
                toastr.success(response.message);
                parent.LoadingOverlay('hide');
            }
        });
    });

    $(document).on('click', '.btn_remove_from_cart', function(e){
        e.preventDefault();
        _form =  $(this).closest("form");
        _data =  _form.serialize();
        url = "{{ route('removecart') }}";
        parent = $(this).closest(".side-block-order-content");
        $.ajax(url,{
            type: 'post',
            data: _data,
            start: parent.LoadingOverlay('show'),
            success:function (response) {
                topcartload();
                sidecartload();
                cartload();
                toastr.success(response.message);
                parent.LoadingOverlay('hide');
            }
        });
    });
</script>

{{--Creating problem for dropdown--}}
{{--<script src="{{URL::asset('frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>--}}
{{--<!-- Popper js -->--}}
<script src="{{URL::asset('frontend/js/bootstrap/popper.min.js')}}"></script>
{{--<!-- Bootstrap js -->--}}
<script src="{{URL::asset('frontend/js/bootstrap/bootstrap.min.js')}}"></script>
{{--<!-- All Plugins js -->--}}
<script src="{{URL::asset('frontend/js/plugins/plugins.js')}}"></script>
{{--<!-- Active js carasol -->--}}

@yield('script')
</body>
</html>