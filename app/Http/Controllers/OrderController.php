<?php

namespace App\Http\Controllers;

use App\Ordertime;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Order;


use App\Setting;
use Cart;
use App\Page;
class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data['page'] = $page = Page::where('slug', $request->path())->first();
        $data['categories'] = Category::where('parent_id', 0)->orderby('order_by')->get();
        $data['category_title'] = 'All Dishes';
        $data['items'] = Item::paginate(5);

        return view('order',$data);
    }

    public function category($category)
    {
        $category = Category::where('slug', $category)->first();
        $data['category_title'] = $category->title;
        $data['category_id'] = $category->id;
        $data['parent_id'] = $category->parent_id;
        $data['categories'] = Category::where('parent_id', 0)->get();
        $data['items'] = $category->items()->paginate(5);

        return view('order', $data);

    }

    public function item($item)
    {
        $data['item'] = $item = Item::where('slug', $item)->first();
        $data['item_image'] = asset('public/images/defimage.gif');
        if($item->image && file_exists(public_path('uploads/items/' . $item->image))){
            $data['item_image'] = asset('public/uploads/items/' . $item->image);
        }
        return view('itemdetails', $data);
    }
    public function addtocart(Request $request)
    {

            $item = Item::find($request->item_id);


        $carts = Cart::search(function ($cartItem, $rowId) use($item) {
            return $cartItem->id === $item->id;
        });
        if(count($carts) == 0){
            Cart::add($item->id, $item->title, $request->quantity, $item->price);
        }else{
            foreach ($carts as $cart) {
                Cart::update($cart->rowId,($cart->qty + $request->quantity));
            }
        }
        if($request->ajax()){
            $data['status'] = 'success';
            $data['message'] = '1 item added to cart';
            return $data;
        }
        return redirect()->back();
    }
    public function cartupdate(Request $request)
    {
        //dd($request);

            $item = Item::find($request->item_id);


        $carts = Cart::search(function ($cartItem, $rowId) use($item) {
            return $cartItem->id === $item->id;
        });
        if(count($carts) > 0){
            foreach ($carts as $cart) {
                Cart::update($cart->rowId,$request->qty);
            }
        }
        if($request->ajax()){
            $data['status'] = 'success';
            $data['message'] = 'Item updated';
            return $data;
        }
        return redirect()->back();
    }

    public function removecart(Request $request)
    {
        Cart::remove($request->cart_id);
        if($request->ajax()){
            $data['status'] = 'success';
            $data['message'] = '1 item removed from cart';
            return $data;
        }
        return redirect()->back();
    }
    public function cartload(Request $request)
    {
        return view('cartload');
    }
    public function topcartload(Request $request)
    {
        return view('topcartload');
    }
    public function sidecartload(Request $request)
    {
        return view('sidecartload');
    }
    public function mobilecartload(Request $request)
    {
        return view('mobilecartload');
    }
    public function orderdetails()
    {
        $data['min_order'] = (int) Setting::ofValue('min_order');
        $data['order_date'] = Ordertime::date();
        $data['order_time'] = Ordertime::hour();
        return view('orderdetails',$data);
    }
    public function placeorder()
    {
        $data['min_order'] = (int)Setting::ofValue('min_order');
//        dd($data['min_order']);
        return view('placeorder',$data);
    }
    public function delivery_time_load(Request $request)
    {
        $data['order_time'] = Ordertime::hour($request->_type,$request->_date);
        return view('delivery_time_load', $data);
    }
    public function orderstore(Request $request)
    {
        $request->validate([
//            'order_type' => 'required',
            'collection_date' => 'required',
            'collection_time' => 'required',
        ]);
        if($request->get('order_type') == null){
            $order_type = 'collection';
        } else {
            $order_type = request('order_type');
        }
        $data['order_type'] = $request->order_type;
        $data['collection_date'] = $request->collection_date;
        $data['collection_time'] = $request->collection_time;
        $request->session()->put('orderdetails', $data);
        return redirect()->route('checkout', ['_t' => encrypt($request->order_type)]);

    }


}
