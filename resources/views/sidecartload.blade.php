<div class="row">
    <div class="col-12">

        <div class="side-block-order border-radius-4">
            <!-- Heading Starts -->
            <h4 class="your_orders_header text-center"><i class="fa fa-shopping-basket"></i> Summary of Your Order</h4>
            <!-- Heading Ends -->
            <!-- Order Content Starts -->

            @if (Cart::content()->count() > 0)
                <div class="side-block-order-content">
                    <!-- Order Item List Starts -->
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="order_item_lists_block">



                                @foreach (Cart::content() as $cart_item)
                                    <ul class="list-unstyle list-inline">

                                        <li class="list-inline-item">{{$cart_item->name}}</li>
                                        <li class="list-inline-item">{{$cart_item->qty}}</li>
                                        <li class="list-inline-item">Rs. {{number_format($cart_item->price * $cart_item->qty,2)}}</li>
                                        <li class="list-inline-item pull-right">
                                            <form action="{{ route('removecart') }}" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="cart_id" value="{{$cart_item->rowId}}">
                                                <button type="submit" class="btn btn-xs btn-danger cancellation btn_remove_from_cart">x</button>
                                            </form>
                                        </li>

                                    </ul>
                                @endforeach





                            </div>
                        </div>
                    </div>

                    <!-- Order Item List Ends -->
                    <!-- Order Item Total Starts -->
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="order-item-total">
                                <ul class="list-unstyle">
                                    <li class="pull-right">Orders Amount :Rs. {{number_format(Cart::subtotal(),2)}}</li>
                                    <li class="pull-right">Total  Amount :Rs. {{number_format(Cart::subtotal(),2)}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Order Item Total Ends -->
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="checkout_button_section text-right">
                                <a href="{{route('orderdetails')}}" class="btn btn-sm btn-primary">Check Out</a>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="no_order text-center">
                    <img src="{{asset('images/shopping-basket.png')}}" class="img-fluid img-center shopping_cart_logo_inner" alt="Shopping Basket">
                    <p class="text-bold text-spl-color text-center">Add Item(s) in the basket</p>
                </div>
                <br>
                @endif




                        <!-- Order Content Ends -->
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="side-block-order border-radius-4">
            <h6 class="txt3333 text-center" style="opacity: 0.4;">Total:&pound;{{number_format(Cart::subtotal(),2)}}</h6>

        </div>
    </div>
</div>


{{--<div class="side-block-order border-radius-4">--}}
    {{--<!-- Heading Starts -->--}}
    {{--<h6 class="txt3333 text-center"><i class="fa fa-shopping-basket"></i> Your Orders</h6>--}}
    {{--<!-- Heading Ends -->--}}
    {{--<!-- Order Content Starts -->--}}

    {{--@if (Cart::content()->count() > 0)--}}
        {{--<div class="side-block-order-content">--}}
            {{--<!-- Order Item List Starts -->--}}
            {{--<ul class="list-unstyled order-item-list">--}}
                {{--@foreach (Cart::content() as $cart_item)--}}
                    {{--<li class="clearfix">--}}
                        {{--<span class="pull-left">{{$cart_item->name}}</span>--}}
                        {{--<span class="cart_quantities">{{$cart_item->qty}}</span>--}}
                        {{--<span class=" pull-right text-spl-color">&pound;{{number_format($cart_item->price * $cart_item->qty,2)}}</span><br>--}}
                                    {{--<span class="pull-right">--}}
                                        {{--<form action="{{ route('removecart') }}" method="post">--}}
                                            {{--{!! csrf_field() !!}--}}
                                            {{--<input type="hidden" name="cart_id" value="{{$cart_item->rowId}}">--}}
                                            {{--<button type="submit" class="btn btn-xs btn-danger cancellation btn_remove_from_cart">x</button>--}}
                                        {{--</form>--}}
                                    {{--</span>--}}
                    {{--</li>--}}

                {{--@endforeach--}}
            {{--</ul>--}}

            {{--<!-- Order Item List Ends -->--}}
            {{--<!-- Order Item Total Starts -->--}}
            {{--<dl class="dl-horizontal order-item-total">--}}
                {{--<dt class="order_amt pull-right">Orders Amount :<span class="text-spl-color text-right">&pound;{{number_format(Cart::subtotal(),2)}}</span></dt>--}}
                {{--<dd></dd>--}}
                {{--<dt class="text-bold pull-right">Total  Amount :<span class="text-bold text-spl-color text-right">&pound;{{number_format(Cart::subtotal(),2)}}</span></dt>--}}
                {{--<dd></dd>--}}

            {{--</dl>--}}
            {{--<!-- Order Item Total Ends -->--}}

            {{--<a href="" class="btn btn-sm btn-danger " role="button">Check Out</a>--}}

        {{--</div>--}}
    {{--@else--}}
        {{--<div class="no_order t-center">--}}
            {{--<img src="{{asset('public/vendor/images/shopping-basket.png')}}" class="img-responsive img-center shopping" alt="Shopping Basket">--}}
            {{--<p class="text-bold text-spl-color text-center">Add Item(s) in the basket</p>--}}
        {{--</div>--}}
        {{--@endif--}}




                {{--<!-- Order Content Ends -->--}}
{{--</div>--}}
{{--<div class="side-block-order border-radius-4">--}}

    {{--<h6 class="txt3333 text-center" style="opacity: 0.4;">Total:&pound;{{number_format(Cart::subtotal(),2)}}</h6>--}}

{{--</div>--}}