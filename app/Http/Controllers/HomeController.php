<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['page'] = \App\Page::find('1');
        $data['about']= \App\Page::where('slug', 'aboutus')->first();
//        dd($data['about']);
        $data['slides'] = \App\Slide::latest()->take(3)->get();
        $data['videos'] = \App\Video::latest()->take(3)->get();
        $data['gallaries'] = \App\Gallery::latest()->take(4)->get();
        $data['reviews']=\App\Review::latest()->take(3)->active()->get();
        return view('welcome', $data);
    }
}
