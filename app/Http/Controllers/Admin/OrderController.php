<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
