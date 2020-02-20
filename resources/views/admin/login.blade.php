<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/demo.css') }}">
</head>
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box" style="width: 30%">
                {{--                    <div class="left">--}}
                <div class="content">
                    <div class="header">
                        <h1 style="text-align: center">
                            Login to your account
                        </h1>
                    </div>
                    <form class="form-auth-small" method="POST" action="{{ url('admin/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                    </form>
                </div>
                {{--                    </div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>
</html>
