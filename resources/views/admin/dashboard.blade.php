@extends('admin.app')
@section('title')
Dashboard
@endsection

@section('content')
<h3 class="page-title">Dashboard</h3>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-shopping-cart fa-fw"></span> Today's online Orders For Collection</h3>
                <p class="panel-subtitle">Date: {{date('d M, y')}}</p>
            </div>
            <div class="panel-body">
                @if ($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#Order</th>
                                <th>Collection time</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{$order->id}}</td>
                                    <td>{{$order->time}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->payment}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                @else
                    <p>Records not found</p>
                @endif

            </div>
            <div class="panel-footer">
                <a href="{{ route('orders.index') }}" class="btn btn-primary">View all</a>
            </div>
        </div>
    </div>
    </div>



@endsection