<div class="table-responsive">
<table class="table table-striped">

        <thead class="thead-light">
        <tr>
            <th scope="col">S.N</th>
            <!-- <th scope="col">Image</th> -->
            <th scope="col">Items</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
        </tr>
        </thead>
    <?php $i = 1; ?>
    @foreach (Cart::content() as $key=>$cart_item)
    
    <tr>
        <td>{{$i++}}</td>

        
        </td>
        <td>{{$cart_item->name}}</td>
        <td>
            <form action="{{ route('cartupdate') }}" class="cart_update_form">
                {!!csrf_field()!!}
                <input type="number" class="cartupdate" name="qty" min="1" value="{{$cart_item->qty}}"/>
                {{--<input type="hidden" name="setmeal" value="{{$cart_item->options->setmeal}}">    --}}
                <input type="hidden" name="item_id" value="{{$cart_item->id}}">
            </form>
        </td>
        <td>Rs. {{$cart_item->price}}</td>
        <td>Rs.{{number_format($cart_item->price * $cart_item->qty,2)}}</td>
        <td class=""><form action="{{ route('removecart') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="cart_id" value="{{$cart_item->rowId}}">
                <input type="hidden" name="setmeal" value="{{$cart_item->options->setmeal}}">
                <button type="submit" class="btn btn-xs btn-danger cancellation">x</button>
            </form></td>
    </tr>
    @endforeach

    <tr>
        <td></td>
        <td class="" colspan="3" >Orders Amount :</td>
        <td class="text-spl-color od-t-p">Rs.{{number_format(Cart::subtotal(),2)}}</td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td class="text-bold" colspan="3" style="font-weight: 600;">Total  Amount :</td>
        <td class="text-bold text-spl-color od-t-p" style="font-weight: 600;">Rs.{{number_format(Cart::subtotal(),2)}}</td>
        <td></td>
    </tr>


</table>
</div>