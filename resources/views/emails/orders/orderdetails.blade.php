
@component('mail::message')
## Dear {{$order->first_name}}

We thank you for choosing us.

## Your order details are listed below

**Order Id:** #{{$order->id}}<br>
**Order Type:** {{$order->type}}<br>
**Payment Type:** {{$order->payment}}<br>
**Collection Date & Time:** {{$order->date_time}}<br>

<table width="100%" bgcolor="#ddd" cellspacing="1">
    <tr bgcolor="#ddd">
        <th align="left" style="padding: 10px">Item</th>
        <th align="right" style="padding: 10px">Qty</th>
        <th align="right" style="padding: 10px">Price</th>
        <th align="right" style="padding: 10px">Total</th>
    </tr>
    @foreach ($order->items as $item)
        <tr bgcolor="white">
            <td style="padding: 5px 10px">{{$item->item}}</td>
            <td style="padding: 5px 10px" align="right">{{$item->qty}}</td>
            <td style="padding: 5px 10px" align="right">Rs.{{$item->price}}</td>
            <td style="padding: 5px 10px" align="right">Rs.{{$item->total}}</td>
        </tr>
    @endforeach
    <tr bgcolor="#f1f1f1">
        <td style="padding: 5px 10px" colspan="3" align="right">Total</td>
        <td style="padding: 5px 10px" align="right">Rs.{{$order->total}}</td>
    </tr>

</table>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent