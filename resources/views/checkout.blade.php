@extends('layouts.master')

@section('title')
    Checkout- Mobile Zone
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
                        <h4>Customer/Billing Details</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--Checkout Starts--}}

    <section class="section-login bg1-pattern my-4">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif
            {{--<h2 class="tit11 t-center p-b-998 p-t-998">--}}
                {{--Customer/Billing Details--}}
            {{--</h2>--}}
            {{--row starts--}}
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    {{--Login Option--}}

                        <div class="wrap-btn-booking float-md-right float-lg-right">
                            <!-- Button3 -->
                            @if (!Auth::check())
                            <span class=""><a class="" href="{{ route('login', ['continue'=>'checkout?_t='.request()->_t]) }}">Log In</a> If you are existing customer.</span>
                            @endif
                            {{--<button type="submit" class="btn3 flex-c-m size-c txt11 trans-0-4 pull-right-md pull-right-lg">--}}
                                {{--Login--}}
                            {{--</button>--}}
                        </div>
                    <br>
                    <br>

                    {{--Login Option End--}}
                    <div class="contact_sections">
                    <form  id="checkout_form_sections" class="my-1" action="{{ route('checkout') }}" method="post">
                        {!! csrf_field() !!}
                        <input name="order_type" type="hidden" value="{{$type}}">
                        <div class="form-group row">

                            <div class="col-md-6 col-sm-12 col-12">
                                <!-- First Name -->

                        <select name="payment_method" id="payment_method" class="form-control flat" placeholder="Payment method">
                            <option value="">Select payment method...</option>
                            <option value="cash_on_collection">Cash on collection</option>

                        </select>
                                <br class="">
                            </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12 col-12">
                                {{--First Name--}}
                                <label for="sr-only" class="text-left">First Name</label>
                                <input type="text" name="first_name" class="form-control" required="required" value="{{old('first_name', isset($lastorder)? $lastorder->first_name : null)}}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-12">
                                <!-- Last Name -->
                                <label for="sr-only" class="text-left">Last Name</label>
                                <input type="text" name="last_name" class="form-control" required="required" value="{{old('last_name', isset($lastorder)? $lastorder->last_name : null)}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <!-- Address -->
                                <label for="sr-only" class="text-left">Address</label>
                                <input type="text" name="address" class="form-control" required="required" value="{{old('address', isset($lastorder)? $lastorder->address : null)}}">

                            </div>


                            <div class="col-md-6 col-sm-12 col-12">
                                <!-- Phone-->
                                <label for="sr-only" class="text-left">Phone</label>
                                <input type="text" name="phone" class="form-control" required="required" value="{{old('phone', isset($lastorder)? $lastorder->phone : null)}}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            @if (!auth::check())
                            <div class="col-md-4 col-sm-12 col-12">
                                <!-- Email -->
                                <label for="sr-only" class="text-left">Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email', isset($lastorder)? $lastorder->email : null)}}"  >


                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <!-- Password -->
                                <label for="sr-only" class="text-left">Password</label>
                                <input type="password" name="password" class="form-control" >

                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <!-- Confirm Password -->
                                <label for="sr-only" class="text-left">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" >
                            </div>
                                @endif
                        </div>



                        <div class="wrap-btn-booking flex-c-o m-t-13 ">
                            <!-- Button3 -->
                            {{--<div class="pull-right" id="postal_btn_text">Please enter valid postal code to Complete order.</div>--}}
                            <button type="submit" class="btn btn-primary float-md-right float-lg-right rounded-0" id="btn_order_complete" role="button">
                                Complete Order
                            </button>

                        </div>
                    </form>
                     </div>
                </div>


            </div>
            {{--Row Ends   --}}
        </div>
    </section>
</main>

    {{--Checkout Ends--}}

@stop

@section('script')
    {{--<script>--}}
        {{--$(function() {--}}
            {{--validPostal();--}}
            {{--$('#postal_code').on('keyup', _.debounce(function () {--}}
                {{--validPostal();--}}
            {{--},  500));--}}
        {{--});--}}

        {{--function validPostal() {--}}
            {{--url = "{{ secure_url('checkpostalcode') }}";--}}
            {{--postal_code = $('#postal_code').val();--}}
            {{--$.ajax(url, {--}}
                {{--start: $('.postal_code_wrap').LoadingOverlay('show'),--}}
                {{--data: {--}}
                    {{--// _token: "{{ csrf_token() }}",--}}
                    {{--postal_code: postal_code,--}}
                {{--},--}}
                {{--success: function (response) {--}}
                    {{--if(response.status == 'success'){--}}
                        {{--$('#postal_help_text').addClass('text-success');--}}
                        {{--$('#postal_help_text').removeClass('text-danger');--}}
                        {{--$('#btn_order_complete').removeAttr('disabled');--}}
                        {{--$('#postal_btn_text').hide();--}}
                    {{--}else{--}}
                        {{--$('#postal_help_text').addClass('text-danger');--}}
                        {{--$('#postal_help_text').removeClass('text-success');--}}
                        {{--$('#btn_order_complete').attr("disabled", "disabled");--}}
                        {{--$('#postal_btn_text').show();--}}
                    {{--}--}}
                    {{--$('#postal_help_text').html(response.msg);--}}
                    {{--$('.postal_code_wrap').LoadingOverlay('hide');--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
    {{--</script>--}}
@stop