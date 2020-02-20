<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>LOGIN</title>
</head>
<body>
{{--@section('content')--}}
{{--    <main>--}}
{{--        <section class="banner_wrap container-fluid p-0">--}}
{{--            <div class="overlay"></div>--}}
{{--            <div class="banner_wrap_bg" style="background-image:  url('{{ App\Setting::getBg() }}');"></div>--}}
{{--        </section>--}}

        <!-- Sign up -->
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="section-signup bg2-pattern mt-3 mb-4 float-md-right">
                    <span class="txt55 m-10" >
                        <h1 style="alignment:center;">Login to your account?</h1>
                       <p style="alignment:center;">Don't have an Account?
                        <a class="btn_login flex-c-m size18 txt11 trans-0-4 m-10" href="{{route('register')}}">
                        Sign up!
                    </a>
                        </p>
                    </span>

                </div>
            </div>
        </div>
        <!-- Login form -->
        <section class="section-login bg1-pattern mt-4 mb-4">
            <div class="container">

                <form class="wrap-form-reservation size22 m-l-r-auto" action="{{ route('login') }}"  method="POST" role="form" id="login_form">
                {{ csrf_field() }}

                <!-- Email address-->
                    <div class=" form-group row">

                        <div class="col-md-3"></div>
                        <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">

						<span class="txt9">
							Email Address
						</span>

                            <div class="wrap-inputemail mt-3 mb-2">
                                <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Please Enter Your Email ID" required autofocus>
                                {{--<i class="fa fa-envelope ab-r-m m-r-999" aria-hidden="true"></i>--}}
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>

                    {{--Password--}}
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">

						<span class="txt9">
							Password
						</span>

                            <div class="wrap-inputphone mt-3 mb-2">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Enter Your Password" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="wrap-btn-booking flex-c-m mt-3 text-center">
                                <!-- Button3 -->
                                <button type="submit" class="btn btn-primary rounded-0">
                                    Login
                                </button>

                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </section>
    </main>
{{--@endsection--}}





</body>
</html>


{{--@extends('layouts.master')--}}
{{--@section('title')--}}
{{--    Login--}}
{{--@endsection--}}

