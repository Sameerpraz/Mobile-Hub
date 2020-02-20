@extends('admin.app')

@section('title')
    Change Password
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="login-wrap">
                    <div class="panel">
                        <div class="panel-heading">
                            <center>
                                <h1>Change Password</h1>
                                {{--
                                <p>Please enter your login details below to authenticate.</p> --}}
                            </center>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('password.change') }}">
                                {{ csrf_field() }}
                                <center style="background-color: #0b97c4;">
                                    Fill out the fields below to reset your password.
                                    {{--
                                    <p>Please enter your login details below to authenticate.</p> --}}
                                </center>

                                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                    <label for="old_password" class="col-md-4 control-label">Old Password</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password" class="form-control" name="old_password" required>

                                        @if ($errors->has('old_password'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('old_password') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">New Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Change Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
