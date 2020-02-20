@extends('layouts.master')

@section('title')
    Order Details- Mobile Zone
@endsection
@section('content')

<main>

    {{--Order details Starts--}}
    <section class="section-login bg1-pattern mt-2 mt-md-4 mb-2 mb-md-4">
        <div class="container">

            {{--row starts--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::content()->count() > 0)
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="side-block-order border-radius-4">

                        <!-- Order Content Starts -->


                        <div class="side-block-order-content" id="cartload">
                            <!-- Order Item List Starts -->
                        </div>


                        <!-- Order Content Ends -->

                    </div>
                </div>
            </div>
            <br>
            {{--2nd Row--}}

                <br>
                <form action="{{ url('orderdetails') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-12 d-none">
                            <div class="collection-block-order border-radius-4 mb-sm-2 d-none">
                                <div class="well delivery-details">
                                    <h4 class="text-spl-color text-bold">Collection Detail</h4>
                                    <div class="order-button">
                                        <label class="order_type btn button-primary button-border active">
                                            <input type="radio" name="order_type" value="collection" checked="checked">Collection from store
                                        </label>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-8 m-auto">
                            <div class="side-block-order border-radius-4">
                                <div class="well delivery-date-time">
                                    <h4 class="text-spl-color text-bold">Collection Date & Time</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="form-control" name="collection_date" id="collection_date">
                                                @foreach ($order_date as $key => $value)
                                                    <option value="{{$key}}" >{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control" style="{{ $errors->has('delivery_time') ? 'border-color:red' : '' }}" name="collection_time" id="collection_time">
                                                <option value="">-- Select Time --</option>
                                                @foreach ($order_time as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--second row ends--}}

                    <div class="row mt-3">
                        <a class="btn btn-success m-auto mt-3" href="{{ route('order') }}" role="button">Continue Shopping</a>
                        <div class="placeorder m-auto mt-2" id="placeorder">loading...</div>
                    </div>

{{--                    <div class="placeorder float-md-right mt-2" id="placeorder">loading...</div>--}}



                </form>
            {{--</form>--}}

            {{--2nd Row End--}}
            @else
                <p class="text-bold text-spl-color text-center">No Item(s)</p>
            @endif
            <div class="clearfix"></div>
         </div>
     </section>
</main>
    <div class="modal fade ot-example-modal-sm md-in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">

                    <h3 style="padding-bottom: 10px;">Sorry, We Donot Deliver Food.</h3>

                    <button class="btn btn-primary btn-sm" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        placeorder()
        function placeorder(){
            url = "{{ route('placeorder') }}";
            $.ajax(url,{
                type: 'post',
                data: {
                    _token: "{{csrf_token()}}",

                },
                start: $('#placeorder').html('loading...'),
                success:function (response) {
                    $('#placeorder').html(response);
                }
            });
        }

//        $('.btn_order_type').on('click', function () {
//            placeorder($(this).find('input').val());
//            collection_date($(this).find('input').val(),$('#delivery_time').val());
//        });


    </script>
    <script>
        $(function() {
            cartload();
        });
        $(document).on('change', '.cartupdate', function(){
            _form =  $(this).closest("form");
            _data =  _form.serialize();
//            $('#placeorder').html('loading...')
            url = "{{ route('cartupdate') }}";
            $.ajax(url,{
                type: 'post',
                data: _data,
                start: $('#cartload').LoadingOverlay('show'),
                success:function (response) {
                    cartload();
                    placeorder();
                    topcartload();
                    $('#cartload').LoadingOverlay('hide');
                }
            });
        });
        $(document).on('submit', '.cart_update_form', function(e){
            e.preventDefault();
            _form =  $(this);
            _data =  _form.serialize();
//            $('#placeorder').html('loading...')
            url = "{{ route('cartupdate') }}";
            $.ajax(url,{
                type: 'post',
                data: _data,
                start: $('#cartload').LoadingOverlay('show'),
                success:function (response) {
                    cartload();
                    placeorder();
                    topcartload();
                    $('#cartload').LoadingOverlay('hide');
                }
            });
        });

        function cartload() {
            url = "{{ route('cartload') }}";
            $.ajax(url,{
                type: 'post',
                data: {
                    _token: "{{csrf_token()}}",
                },
                success:function (response) {
                    $('#cartload').html(response);
                }
            });
        }
//        $("#").attr('disabled', 'disabled');


    </script>
@stop