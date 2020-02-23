@extends('layouts.master')

@section('title')
    {{$page->title}}
@endsection
@section('content')


    <main>

        <section class="section-login bg1-pattern mt-2 mt-md-4 mb-2 mb-md-4">
            <div class="container">

                <div class="row">
                    {{--Categories--}}
                    <div class="col-md-3 col-sm-6 col-12 bo5-l">
                        <div class="mobilecategory dropdown d-block d-sm-none">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-mobilecategory btn-default btn-block">

                                Categories
                            </button>
                            <ul class="dropdown-menu order_category_mobile_ul" aria-labelledby="dLabel">
                                @foreach ($categories as $category)
                                    <li><a class="menu_category txt27-category" href="#{{$category->slug}}" >{{$category->title}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="categories sidebarmenu d-none d-sm-block">
                            <h3 class="">
                                Categories
                            </h3>

                            <ul class="order_categories_block">
                                @foreach ($categories as $category)
                                    <li {{isset($category_id) && $category->id == $category_id || isset($parent_id) && $category->id == $parent_id ? 'class=active' : null}}>
                                        <a href="#{{$category->slug}}" class="">
                                            {{$category->title}}
                                        </a>
                                        @if ($category->child->count() > 0)
                                            <ul class="sub_menu">
                                                @foreach ($category->child as $child)
                                                    <li {{isset($category_id) && $child->id == $category_id ? 'class=active' : null}}><a href="#{{$child->url}}">{{$child->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                    {{--Categories End--}}

                    <!-- Main menu -->
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class=" p-t-993 p-r-35 p-r-15-lg m-l-r-auto">
                            @foreach ($categories as $category)
                                <div class="wrap-item-mainmenu p-b-22">
                                    <h3 class="tit-mainmenu txt33-menu p-b-25" id="{{$category->slug}}">
                                        {{$category->title}}
                                    </h3>

                                    <!-- Item mainmenu -->
                                    @foreach ($category->items as $item)
                                        <div class=" order-menu-item item-mainmenu mb-4">
                                            <div class="flex-w flex-b mb-2">
                                                @if($item->image)
                                                    <div class="row" id="lightgallery">
                                                            <a  class="col-md-4 col-sm-12 col-12 mb-4 hov-img-zoom" href="{{url('public/uploads/items/'.$item->image)}}" title="{{ $item->image }}">
                                                                <img src="{{url('public/uploads/items/'.$item->image)}}" alt="{{$item->image}}" width="100%" class="img-fluid">
                                                            </a>
                                                    </div>
                                                @endif

                                                <a href="{{route('item.display',$item->slug)}}" class="name-item-mainmenu txt21-item">
                                                    {{$item->title}}
                                                </a>

                                                <div class="line-item-mainmenu bg3-pattern"></div>

                                                <div class="price-item-mainmenu txt22">
                                                    <form  method="post" action="{{ route('addtocart') }}">
                                                        {!! csrf_field() !!}
                                                        <div class="input-group">
                                                            <input type="hidden" value="1" class="input-sm form-control" name="quantity">
                                                            <input type="hidden" value="{{$item->id}}" class="input-sm form-control" name="item_id">
                                                            <button  class="btn animation btn-success btn_add_to_cart txt22" type="submit" style=" padding:5px; margin: 0;">
                                                                <span class="price-new ">Rs.{{number_format($item->price,2)}} </span>
                                                            </button>
                                                        </div>
                                                        <!-- /input-group -->
                                                        <input type="hidden" name="" value="">
                                                    </form>

                                                </div>

                                            </div>

							<span class="info-item-mainmenu txt23">
                                {{$item->details}}
							</span>
                                        </div>


                                    @endforeach

                                    @if ($category->child->count() > 0)
                                        @foreach ($category->child as $cc)
                                            <h5 class="tit-mainmenu txt33-menu p-b-25" id="{{$category->slug}}">
                                                {{$cc->title}}
                                            </h5>
                                            @if($cc->items->count() >0)
                                                @foreach($cc->items as $items)
                                                    <div class=" order-menu-item item-mainmenu mb-4">
                                                        <div class="flex-w flex-b mb-2">
                                                            @if($item->image)
                                                                <figure>
                                                                    <img src="{{url('public/uploads/items/'.$items->image)}}" alt="" height="120" width="120">
                                                                </figure>
                                                            @endif
                                                            {{--<img src="{{url('public/uploads/items/'.$items->image)}}" width="30" alt="">--}}

                                                            <a href="{{route('item.display',$items->slug)}}" class="name-item-mainmenu txt21-item">
                                                                {{$items->title}}
                                                            </a>

                                                            <div class="line-item-mainmenu bg3-pattern"></div>

                                                            <div class="price-item-mainmenu txt22">
                                                                <form  method="post" action="{{ route('addtocart') }}">
                                                                    {!! csrf_field() !!}
                                                                    <div class="input-group">
                                                                        <input type="hidden" value="1" class="input-sm form-control" name="quantity">
                                                                        <input type="hidden" value="{{$items->id}}" class="input-sm form-control" name="item_id">
                                                                        <button  class="btn animation btn-success btn_add_to_cart txt22" type="submit" style=" padding:5px; margin: 0;">
                                                                            <span class="price-new ">Rs.{{number_format($items->price,2)}} </span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- /input-group -->
                                                                    <input type="hidden" name="" value="">
                                                                </form>

                                                            </div>

                                                        </div>

							<span class="info-item-mainmenu txt23">
                                {{$items->details}}
							</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach

                        </div>



                    </div>
                    {{--Main Menu End--}}
                    {{--Cart--}}
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="sidebarcart d-none d-md-block" id="sidecartload">
                            <div class="row">
                                <div class="col-12">

                            <div class="side-block-order border-radius-4">
                                <!-- Heading Starts -->
                                <h4 class="your_orders_header text-center"><i class="fa fa-shopping-cart"></i> Your Orders</h4>
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
{{--                            <div class="side-block-order border-radius-4">--}}
{{--                                <h6 class="txt3333 text-center" style="opacity: 0.4;">Total:&pound;{{number_format(Cart::subtotal(),2)}}</h6>--}}

{{--                            </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Cart Ends  --}}
                    {{--Row End--}}
                </div>
                {{--Container End--}}
            </div>
        </section>




        </main>


    {{--Order Section    --}}
    <div class="mobilecart d-block d-md-none mb-2" id="mobilecartload">
        @if (Cart::count() >0)
            <div class="row text-center">
                <div class="col-sm-3"><i class="fa fa-shopping-basket"></i> {{Cart::count()}}</div>
                <div class="col-sm-4">Rs.{{number_format(Cart::subtotal(),2)}}</div>
                <div class="col-sm-5"><a href="{{route('orderdetails')}}" class="btn btn-sm btn-danger btn-block" role="button">Check Out</a></div>
            </div>
        @endif
    </div>


@stop
@section('script')

    <script>
        $(function() {
            $('.menu_category').on('click', function (e) {
                e.preventDefault();
                var target = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: ($(target).offset().top)
                }, 2000);
            });
            $(".sidebarmenu").stick_in_parent();
            $(".sidebarcart").stick_in_parent();

            $('.mobilecategory').affix({
                offset: {
                    top: $('.mobilecategory').offset().top,
                    bottom: function () {
                        return (this.bottom = $('footer').outerHeight(true) + 20)
                    }
                }
            });
            $('.mobilecategory').on('affix.bs.affix', function () {
                $(this).css('z-index', 99);
                $(this).css('width', ($(this).width()));
            });


        });
        </script>
    <link rel="stylesheet" href="{{ asset('vendors/lightgallery/lightgallery.min.css') }}">
    <script src="{{ asset('vendors/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/lg-zoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery'),{
                download:true,
                // zoom: true,
            });
        });
    </script>
    @stop