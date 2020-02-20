<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;

class UserController extends Controller
{
    public function profile()
    {
    	$data['user'] = Auth::user();
    	$data['lastorder'] = Order::where('user_id', Auth::user()->id)->latest()->first();
    	$data['orderhistory'] = Order::where('user_id', Auth::user()->id)->latest()->take(5)->get();
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
    		return redirect()->route('profile')->with('success', 'Password Change');
    	}else{
    		return back()->with('password_match', 'Old password doesn\'t match.');
    	}
    }
}
