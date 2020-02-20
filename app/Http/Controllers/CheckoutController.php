<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use App\Order;
use App\Orderitem;
use Cart;

use App\Mail\NewOrder;
use App\Mail\OrderDetails;
use Illuminate\Support\Facades\Mail;






class CheckoutController extends Controller
{

    public function index(Request $request)
    {
       $orderdetails = $request->session()->get('orderdetails');
       if (!$orderdetails) {
           return redirect()->route('orderdetails');
       }

       if(!$request->_t)
           return redirect()->route('orderdetails');
       $data['type'] = decrypt($request->_t);
        if (Auth::check()) {
            $data['lastorder'] = Order::where('user_id', Auth::user()->id)->latest()->first();
        }
        return view('checkout', $data);
    }

    public function checkout(Request $request)
    {
        $rules =  array(
            'payment_method' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        );
        if (!Auth::check()) {
            $rules +=  array(
                'email' => 'required',
                'password' => 'required|string|min:6|confirmed',
            );
        }
        $request->validate($rules);

        if (Auth::check()) {
            $user = Auth::user();
        }else{
            $user = User::where('email', $request->email)->first();
            if(!$user){
                $user = new User;
                $user->groups = 10;
                $user->name = $request->first_name .' '.$request->lastname;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
            }
        }

        $orderdetails = $request->session()->get('orderdetails');
        $date = date('Y-m-d', strtotime($orderdetails['collection_date']));
        $time = date('H:i:s', strtotime($orderdetails['collection_time']));
        $date_time = $date .' '. $time;
        $order_type = $orderdetails['order_type'];

        $order = new Order;
        $order->user_id = $user->id;
        $order->order_type = $order_type;
        $order->collection_date_time = $date_time;

        $order->payment_method = $request->payment_method;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->email = $request->email ? $request->email : $user->email;
        $order->save();

        foreach (Cart::content() as $cart_item){
            $orderitem = new Orderitem;
            $orderitem->order_id = $order->id;
            $orderitem->item = $cart_item->name;
            $orderitem->price = $cart_item->price;
            $orderitem->qty = $cart_item->qty;
            $orderitem->total = $cart_item->price * $cart_item->qty;
            $orderitem->save();
        }

        Cart::destroy();
        $request->session()->forget('orderdetails');

        Mail::send(new OrderDetails($order));
        Mail::send(new NewOrder($order));
        return redirect('checkout/complete');

    }



    public function complete()
    {
        return view('checkoutcomplete');
    }

}
