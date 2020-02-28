@extends('layouts.master')
@section('title') Order Details [#{{$order->id}}]
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
                            <h4>Order Details [#{{$order->id}}]</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about_page_wrap container-fluid pt-0 mt-md-5 mb-md-5" >
            <div class="container">
                @if (!$user->isAdmin)
                <div class="row">

                        <div class="col-sm-12">
                            <br>
                            <b>Order Type:</b> {{$order->type}} <br>
                            <b>Payment Type:</b> {{$order->payment}}({!!$order->status == 1 ? '<span class="text-success">Paid</span>' : '<span class="text-danger">Unpaid</span>'!!}) <br>
                            <b>Delivery Date & Time:</b> {{$order->date_time}} <br>
                            <br>
                        </div>

                    </div>

                    @if ($order->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{$item->item}}</td>
                                        <td class="text-right">{{$item->qty}}</td>
                                        <td class="text-right">Rs.{{$item->price}}</td>
                                        <td class="text-right">Rs.{{$item->total}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-right">Total</td>
                                    <td class="text-right">Rs.{{$order->total}}</td>
                                </tr>

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