<div class="row text-center">
    <div class="col-sm-3"><i class="fa fa-shopping-basket"></i> {{Cart::count()}}</div>
    <div class="col-sm-4">Rs.{{number_format(Cart::subtotal(),2)}}</div>
    <div class="col-sm-5"><a href="{{route('orderdetails')}}" class="btn btn-sm btn-danger btn-block" role="button">Check Out</a></div>
</div>