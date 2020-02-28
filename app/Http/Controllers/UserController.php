<?php

namespace App\Http\Controllers;

use App\Mail\UserPaymentDone;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function profile()
    {
    	$data['user'] = Auth::user();
		$data['order_status']=Order::where('user_id',Auth::user()->id)->latest()->get();
    	$data['lastorder'] = Order::where('user_id', Auth::user()->id)->latest()->first();
    	$data['orderhistory'] = Order::where('user_id', Auth::user()->id)->active()->latest()->take(5)->get();
    	return view('profile', $data);
    }

    public function changepassword(Request $request)
    {
    	$request->validate([
    		'old_password' => 'required',
    		'password' => 'required|string|min:6|confirmed',
    	]);
    	$user = Auth::user();
    	if(\Hash::check($request->old_password, $user->password)){

    		$user->password = bcrypt($request->password);
    		$user->save();
    		return redirect()->route('profile')->with('passwordsuccess', 'Password Change');
    	}else{
    		return back()->with('password_match', 'Old password doesn\'t match.');
    	}
    }

	public function paid($id)
	{
		$orders = Order::find(decrypt($id));
//        dd($orders->email);
		$id=$orders->id;
//        $value=$orders->remaining;

//        $issue->remaining=$value-1;
		$data = array(
			'status' => 1,

		);

		if(Order::where('id',$orders->id)->update($data))
		{
			Mail::send(new UserPaymentDone($orders, $id));
			return redirect()->route('profile')->with('success','Order paid.');
		}
	}
	public function userordershow(Order $order)
	{
		$user = Auth::user();
		return view('order.show', compact('order','user'));
	}
}
