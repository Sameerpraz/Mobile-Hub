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
    <title>Register</title>
</head>
<body>
<!-- Signup form -->
<section class="section-register mt-5 mb-5">
    <div class="container">

        {{--Name--}}
        <form method="post" action="{{ route('register')}}">
            {{ csrf_field() }}
            <div class="form-group row">

                <div class="col-md-3"></div>
                <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}" >
                    <span class="txt9">Name</span>
                    <div class="wrap-inputemail mt-3 mb-2">
                        <input class="form-control"  name="name" value="{{ old('name') }}" id="name" type="text" placeholder="Name" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <!-- Email address-->
            <div class="form-group row">
                <div class="col-md-3"></div>
                <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="txt9">Email Address</span>
                    <div class="wrap-inputemail mt-3 mb-2  ">
                        <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>
            </div>

            {{--Password--}}
            <div class=" form-group row">
                <div class="col-md-3"></div>
                <div class="col-md-6  {{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="txt9">Password</span>
                    <div class="wrap-inputphone mt-3 mb-2">
                        <input class="form-control" type="password" id="password" name="password"  placeholder="Password" required/>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{--Confirm Password--}}
            <div class="form-group row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <span class="txt9">Confirm Password</span>
                    <div class="wrap-inputphone mt-3 mb-2">
                        <input class="form-control" type="password" name="password_confirmation" required >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="wrap-btn-booking mt-3 mb-2">
                        <!-- Button3 -->
                        <button type="submit" class="btn btn-primary rounded-0">Signup</button>
                    </div>

                </div>
                <div class="col-md-3"></div>
            </div>

        </form>
    </div>
</section>
</body>
</html>