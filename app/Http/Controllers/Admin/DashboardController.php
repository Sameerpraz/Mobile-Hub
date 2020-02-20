<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::where('collection_date_time', '>=', date('Y-m-d'))->orderBy('collection_date_time')->take(5)->get();
        return view('admin.dashboard',$data);
    }

    public function phpinfo()
    {
    	phpinfo();
    }

    public function passwordchange()
    {
        return view('auth.passwords.change');
    }

    public function passwordstore(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            \Session::flash('success', 'Password Changed');
            return redirect('admin');
        }else{
            \Session::flash('error', 'Password does not match');
            return redirect('admin');
        }
    }

}
