<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Orderitem;
use Dompdf\Dompdf;
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
    public function index(Request $request)
    {
        $order = Order::query();
        if($request->keyword){
            $like = '%' . $request->keyword . '%';
            $order->orWhere('first_name', 'like', $like);
//            $order->orWhere('slug', 'like', $like);
        }
        $today_orders = Order::today()->paginate(10, ['*'], 'today_orders');
        $orders = $order->paginate(20);
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
        if($orders->order_type == 'collection')
        {
            $status=1;
        }
        else
        {
           $status=0;
        }

//        $value=$orders->remaining;

//        $issue->remaining=$value-1;
        $data = array(
            'paid' => 1,
            'status'=>$status,


        );

        if(Order::where('id',$orders->id)->update($data))
        {
            Mail::send(new PaymentDone($orders, $id));
            return redirect()->route('orders.index')->with('success','Order was paid.');
        }
    }

    public function monthlyreport(Request $request)
    {
        $date = \Carbon\Carbon::today()->subDays(30);
        $orderss=Order::where('created_at','>=',$date)->where('paid',1)->get();
        $orders = Orderitem::where('created_at', '>=', $date)->get();
//        dd($orders);
        $total_items_count=0;
        $total_revenue_count=0.00;
       foreach($orderss as $od)
       {
           if($od->payment_method == 'cash_on_collection' && $od->paid == 1)
           {
//               $total_items_count=$od->items()->count();
//               $total_revenue_count=$total_revenue_count+($od->items()->total);
               foreach($od->items as $key=>$item)
               {
                        $total_items_count=$total_items_count+($item->qty);
                       $total_revenue_count=$total_revenue_count+($item->total);


               }
           }
//           $total_items_count=$total_items_count+($od->qty);
//           $total_revenue_count=$total_revenue_count+($od->total);

       }

        $view = view('admin.monthlyreport.pdfview', compact('orderss','orders','total_revenue_count','total_items_count'));
        // return $view;

        $dompdf = new Dompdf();
        $dompdf->loadHtml("$view");
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option('defaultFont', 'Courier');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $dompdf->stream("Monthly report from" .$date . ".pdf", array("Attachment" => false));

    }

    public function weeklyreport(Request $request)
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $orderss=Order::where('created_at','>=',$date)->where('paid',1)->get();
        $orders = Orderitem::where('created_at', '>=', $date)->get();
//        dd($orders);
        $total_items_count=0;
        $total_revenue_count=0.00;
        foreach($orderss as $od)
        {
            if($od->payment_method == 'cash_on_collection' && $od->paid == 1)
            {
//               $total_items_count=$od->items()->count();
//               $total_revenue_count=$total_revenue_count+($od->items()->total);
                foreach($od->items as $key=>$item)
                {
                    $total_items_count=$total_items_count+($item->qty);
                    $total_revenue_count=$total_revenue_count+($item->total);


                }
            }
//           $total_items_count=$total_items_count+($od->qty);
//           $total_revenue_count=$total_revenue_count+($od->total);

        }

        $view = view('admin.weeklyreport.pdfview', compact('orderss','orders','total_revenue_count','total_items_count'));
        // return $view;

        $dompdf = new Dompdf();
        $dompdf->loadHtml("$view");
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option('defaultFont', 'Courier');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $dompdf->stream("Weekly report from" .$date . ".pdf", array("Attachment" => false));

    }

    public function dailyreport(Request $request)
    {
        $date = \Carbon\Carbon::today();
        $orderss=Order::where('created_at','>=',$date)->where('paid',1)->get();
        $orders = Orderitem::where('created_at', '>=', $date)->get();
//        dd($orders);
        $total_items_count=0;
        $total_revenue_count=0.00;
        foreach($orderss as $od)
        {
            if($od->payment_method == 'cash_on_collection' && $od->paid == 1)
            {
//               $total_items_count=$od->items()->count();
//               $total_revenue_count=$total_revenue_count+($od->items()->total);
                foreach($od->items as $key=>$item)
                {
                    $total_items_count=$total_items_count+($item->qty);
                    $total_revenue_count=$total_revenue_count+($item->total);


                }
            }
//           $total_items_count=$total_items_count+($od->qty);
//           $total_revenue_count=$total_revenue_count+($od->total);

        }

        $view = view('admin.dailyreport.pdfview', compact('orderss','orders','total_revenue_count','total_items_count'));
        // return $view;

        $dompdf = new Dompdf();
        $dompdf->loadHtml("$view");
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option('defaultFont', 'Courier');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $dompdf->stream("Daily report from" .$date . ".pdf", array("Attachment" => false));

    }
}
