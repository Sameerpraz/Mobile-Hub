<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentDone;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_orders = Order::today()->paginate(10, ['*'], 'today_orders');
        $orders = Order::paginate(20);
        return view('admin.order.index', compact('today_orders', 'orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order && $order->delete()){
            return redirect()->route('orders.index')->with('success', 'Order details deleted.');
        }else{
            return redirect()->route('orders.index')->with('error', 'Error while deleting Order Details.');
        }
    }

    public function decline($id)
    {
        $orders = Order::find(decrypt($id));
//        $value=$classbook->remaining;
        $data = array(
            'paid' => 0,
            'status' => -1,

        );
        if(Order::where('id',$orders->id)->update($data))
        {
            return redirect()->route('orders.index')->with('success','Order was declined.');
        }
    }

    public function approve($id)
    {
        $orders = Order::find(decrypt($id));
//        dd($orders->email);
        $id=$orders->id;
//        $value=$orders->remaining;

//        $issue->remaining=$value-1;
        $data = array(
            'paid' => 1,

        );

        if(Order::where('id',$orders->id)->update($data))
        {
            Mail::send(new PaymentDone($orders, $id));
            return redirect()->route('orders.index')->with('success','Order was paid.');
        }
    }
}
