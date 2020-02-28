<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly report</title>

    <style>
/*/!*body*!/*/
/*/!*{*!/*/
    /*/!*width: 100%;*!/*/
    /*/!*height: auto;*!/*/
    /*/!*margin: 0;*!/*/
    /*/!*padding: 0;*!/*/
    /*/!*overflow: hidden;*!/*/
/*/!*}*!/*/
        /*#cardwapper*/
        /*{*/
            /*width: 1080px;*/
            /*height: auto;*/
            /*margin: auto;*/
        /*}*/
        /*#cardwapper .top_header*/
        /*{*/
            /*padding: 15px 5px;*/

        /*}*/
        /*.top_header h3*/
        /*{*/
            /*color: #000000;*/
            /*text-align: center;*/
        /*}*/
        /*.top_header_left*/
        /*{*/
            /*width: 540px;*/
            /*float: left;*/
            /*margin: 20px 0;*/
        /*}*/
        /*.top_header_right*/
        /*{*/
            /*width: 540px;*/
            /*float: right;*/
            /*margin: 20px 40px;*/
            /*text-align: right;*/
        /*}*/
        /*.top_header_right h4*/
        /*{*/
            /*color: #000000;*/
        /*}*/
        /*#cardwapper .order_table*/
        /*{*/
            /*padding: 15px 5px;*/
        /*}*/
table, th, td {
    border: 1px solid black;
    padding: 10px;
    border-collapse: collapse;
}
    </style>
</head>

<body>

<div class="body_block" style="background-color: white; padding-top: 20px;">
    <h1 style="text-align: center;"><b>Monthly Report</b> </h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6" >
                {{----}}

            </div>
            <div class="col-md-6" style="">
                <div class="list-group row" style="float:right;">
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <label for="name"><b>From:</b> {{\Carbon\Carbon::today()->subDays(30)->format('d M, Y')}} </label>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-6">

                    </div>
                </div>
                <br>
                <br>
                <div class="list-group row" style="float: right;">
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <label for="name"><b>To:</b> {{\Carbon\Carbon::today()->format('d M, Y')}}</label>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-6">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="body_block" style="background-color: white;">
    <div class="table-responsive">
        <table class=" table table-hover" style="width: 100%;">
            <thead class="thead-dark bg-primary">
            <tr>
                <th>S.N</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; $total_revenue_counts=0.00; ?>

            @foreach ($orderss as $order)
            @if ($order->payment_method == 'cash_on_collection')
            @php
            $row = $order->items()->count();
            @endphp
            @foreach ($order->items as $key=>$item)

            @if ($key == 0)
            <tr>
            <td rowspan="{{$row}}">#{{$i}}</td>
            <td>{{$item->item}}</td>
            <td>{{$item->qty}}</td>
            <td>Rs. {{$item->price}}</td>
            <td rowspan="{{$row}}">Rs. {{$order->total}}</td>
            <td rowspan="{{$row}}">{{$order->date}}</td>
            </tr>
            @else
            <tr>
            <td>{{$item->item}}</td>
            <td>{{$item->qty}}</td>
            <td>Rs. {{$item->price}}</td>
            </tr>
            @endif
            @endforeach
            @endif
                <?php $i++; ?>
            @endforeach
            <tr>
                <td  colspan="4" class="text-bold text-center" style="text-align: center; font-weight: bold;">Total:</td>
                <td class="text-bold" style="font-weight: bolder">Rs. {{round($total_revenue_count,2)}}</td>
                <td class="text-bold"></td>

            </tr>
            <!--  -->
            </tbody>
        </table>
    </div>
</div>


<p style="float: right;"><b>Total Items Ordered:</b> {{$total_items_count}}</p>
<br>
<br>
<p style="float:right;"><b>Total Revenue from order:</b>Rs. {{round($total_revenue_count,2)}}</p>


</body>
</html>