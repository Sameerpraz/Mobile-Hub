<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'dashboard') </title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/demo.css') }}">
    <style>
        th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top" style="padding: 1px 1px;">
        <div class="brand" style="background-color:lightskyblue;">
            <a href="{{ route('admin.dashboard') }}">Mobile Zone</a>
        </div>
        <div class="container-fluid" style="background-color:lightskyblue;">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
            </div>
            {{--Search--}}
            {{--<form class="navbar-form navbar-left">--}}
            {{--<div class="input-group">--}}
            {{--<input type="text" value="" class="form-control" placeholder="Search dashboard...">--}}
            {{--<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>--}}
            {{--</div>--}}
            {{--</form>--}}
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    {{--<li><a href=""><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>--}}
                    <li><a href="{{ route('settings.index') }}"><i class="glyphicon glyphicon-cog"></i> <span>Settings</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>{{Auth::user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            {{--<li><a href=""><i class="lnr lnr-user"></i><span>Profile</span></a></li>--}}
                            <li>
                                <a href="#"><i class="fa fa-php "></i>Profile</a>
                                <a href="{{ route('password.change') }}"><i class="lnr lnr-lock"></i> Password Change</a>
                                <a href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="lnr  lnr-exit"></i> <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar" style="border-left-color:red;">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="{{ route('admin.dashboard') }}" {!!(!request()->segment(2) ? 'class="active"' : null) !!} ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ route('pages.index') }}" {!!(request()->segment(2) == 'pages' ? 'class="active"' : null) !!}><i class="lnr lnr-book"></i> <span>Page</span></a></li>
{{--                    <li><a href="{{ route('labels.index') }}" {!!(request()->segment(2) == 'labels' ? 'class="active"' : null) !!}><i class="lnr lnr-pencil"></i> <span>Labels</span></a></li>--}}
                    <li><a href="{{ route('categories.index') }}" {!!(request()->segment(2) == 'categories' ?
                            'class="active"' : null) !!}><i class="lnr lnr-menu"></i> <span>Categories</span></a></li>
                    <li><a href="{{ route('items.index') }}" {!!(request()->segment(2) == 'items' ? 'class="active"' : null) !!}><i class="fa fa-phone"></i> <span>Product name</span></a></li>

{{--                    <li><a href="{{ route('slides.index') }}"{!!(request()->segment(2) == 'slides' ? 'class="active"' : null) !!}>--}}
{{--                            <i class="lnr lnr-picture"></i><span>Slide</span></a></li>--}}
{{--                    <li><a href="{{ route('galleries.index') }}" {!!(request()->segment(2) == 'galleries' ? 'class="active"' : null) !!}><i class="lnr lnr-camera"></i> <span>Galleries</span></a></li>--}}
                    <li><a href="{{ route('videos.index') }}" {!!(request()->segment(2) == 'videos' ? 'class="active"' : null) !!}><i class="fa fab fa-youtube"></i> <span>Videos</span></a></li>
{{--                    <li><a href="{{ route('reviews.index') }}" {!!(request()->segment(2) == 'reviews' ? 'class="active"' : null) !!}><i class="lnr lnr-bubble"></i> <span>Reviews</span></a></li>--}}
{{--                    <li><a href="{{ route('socials.index') }}"><i class="lnr lnr-link"></i> <span>Social</span></a></li>--}}
{{--                    <li><a href="{{ route('milks.index') }}" {!!(request()->segment(2) == 'milks' ? 'class="active"' : null) !!}><i class="lnr lnr-user"></i> <span>Milk Subs</span></a></li>--}}
{{--                    <li><a href="{{ route('contacts.index') }}"{!!(request()->segment(2) == 'contacts' ? 'class="active"' : null) !!}><i class="lnr lnr-bubble"></i> <span>Messages</span></a></li>--}}

                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>
                            {{ Session::get('success') }}
                        </p>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>
                            {{ Session::get( 'error') }}
                        </p>
                    </div>
                @endif
                <br>
            @yield('content')
            <!-- END OVERVIEW -->
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            {{-- <p class="copyright">&copy;  <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p> --}}
        </div>
    </footer>
</div>
<!-- END WRAPPER -->


<!-- Scripts -->
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('vendors/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('backdo0r/scripts/klorofil-common.js') }}"></script>
@yield('script')
</body>
</html>
