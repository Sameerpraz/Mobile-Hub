@extends('layouts.master')
@section('title') My Account
@endsection

@section('content')


    <main>
        <section class="banner_wrap container-fluid p-0">
            <div class="page-overlay"></div>
            <div class="banner_wrap_bg" style="background-image: url('{{ App\Setting::getBg() }}');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="banner_sections" >
                            <h4> My Account</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about_page_wrap container-fluid pt-0 mt-md-5 mb-md-5" >
        <div class="container">

            @if (!$user->isAdmin)

            <div class="row">
                <div class="col-sm-7">
                    <h3>Profile Info</h3>
                    <p><b>Name:</b> {{$user->name}}</p>
                    <p><b>Email:</b> {{$user->email}}</p>
                    <p><b>Address:</b> {{$lastorder ? $lastorder->address : null }}</p>
                    <p><b>Phone:</b> {{$lastorder ? $lastorder->phone : null }}</p>
                </div>
                <div class="col-sm-4 col-sm-offset-1">

                    <div class="well">
                        <h3>Change Password</h3>
                        <hr>

                        @if (\Session::has('password_match'))
                            <div class="alert alert-danger">{{\Session::get('password_match')}}</div>
                        @endif

                        @if (\Session::has('success'))
                            <div class="alert alert-success">{{\Session::get('success')}}</div>
                        @endif

                        <form action="{{ route('changepassword') }}" method="POST" class="" role="form" id="checkout_form_sections">

                            {!!csrf_field()!!}

                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label class="sr-only">Old Password</label>
                                <input type="password" class="form-control" id="" placeholder="Old Password" name="old_password">
                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="sr-only" >New Password</label>
                                <input type="password" class="form-control" id="" placeholder="New Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="sr-only" >Re-enter Password</label>
                                <input type="password" class="form-control" id="" placeholder="Re-enter Password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                        </form>
                    </div>

                </div>
            </div>

            <hr>
            <h3>Order History </h3>

            @if ($orderhistory->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#OrderID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderhistory as $order)
                            @if ($order->payment_method == 'cash_on_collection')
                                @php
                                        $row = $order->items()->count();
                                @endphp
                                @foreach ($order->items as $key=>$item)
                                    @if ($key == 0)
                                    <tr>
                                        <td rowspan="{{$row}}">#{{$order->id}}</td>
                                        <td>{{$item->item}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td rowspan="{{$row}}">{{$order->total}}</td>
                                        <td rowspan="{{$row}}">{{$order->date}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{$item->item}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>Records not found</p>
            @endif
            @else
            <p>Admin :)</p>
            @endif
            

            <div class="clearfix"></div>
        </div>
   </section>
    </main>

@endsection

