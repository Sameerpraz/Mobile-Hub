
{{--<button type="submit" class="btn btn-danger btn7 pull-right">Place Order</button>--}}

@if (Cart::subtotal() >= $min_order)
    {{-- <a class="btn btn-danger pull-right"  href="{{route('checkout')}}" role="button">Place Order</a> --}}
    <button type="submit" class="btn btn-warning btn7 float-md-right">Place Order</button>
@else
    <div class="alert alert-danger float-md-right">
        <p><b>Warning:</b> We do not have option for order less than Rs. {{$min_order}}</p>
    </div>
@endif