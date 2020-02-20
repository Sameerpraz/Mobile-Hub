<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.review.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',            
            'name' => 'required',
//            'email'=>'required',

            // 'country_id' => 'required',            
            'details' => 'required',
        ]);

        $review = new Review;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->country_id = $request->country_id;
        $review->title = $request->title;



        $review->details = $request->details;

        $review->save();

        if ($request->hasFile('image')) {
            $image_name = 'review-'.$review->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/reviews/', $image_name);
            $review->image = $image_name;
            $review->save();
        }

        return redirect()->route('reviews.index')->with('success', 'Review added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $countries = Country::all();    
        return view('admin.review.edit', compact('review', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->validate($request, [
            'title' => 'required',            
            'name' => 'required',            
            // 'country_id' => 'required',            
            'details' => 'required',
        ]);

        $review->name = $request->name;
        $review->email = $request->email;
        $review->country_id = $request->country_id;
        $review->title = $request->title;
        $review->details = $request->details;

        $review->save();

        if ($request->hasFile('image')) {
            if($review->image && file_exists(public_path('uploads/reviews/'.$review->image))){
                unlink(public_path('uploads/reviews/'.$review->image));
            }
            $image_name = 'review-'.$review->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/reviews/', $image_name);
            $review->image = $image_name;
            $review->save();
        }

//        if ($request->hasFile('image')) {
//            $image_name = 'review-'.$review->id . '.'.$request->image->extension();
//            $path = $request->image->move('public/uploads/reviews/', $image_name);
//            $review->image = $image_name;
//            $review->save();
//        }
        return redirect()->route('reviews.index')->with('success', 'Review saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        if($review){

            if($review->image){
                $image = public_path('uploads/reviews/' . $review->image);
                if(file_exists($image)){
                    unlink($image);
                }
            }

            if($review->delete()){
                return redirect()->route('reviews.index')->with('success', 'Review deleted.');
            }else{
                return redirect()->route('reviews.index')->with('error', 'Error while deleting Review.');
            }

        }else{
            abort();
        }
    }
    public function approve(Review $review)
    {
        if($review){
            $review->status=1;

            if($review->save()){
                return redirect()->route('reviews.index')->with('success', 'Review approved.');
            }else{
                return redirect()->route('reviews.index')->with('error', 'Error while approving Review.');
            }

        }else{
            abort();
        }
    }
    public function cancel(Review $review)
    {
        if($review){
            $review->status=0;

            if($review->save()){
                return redirect()->route('reviews.index')->with('success', 'Review Cancelled.');
            }else{
                return redirect()->route('reviews.index')->with('error', 'Error while cancelling Review.');
            }

        }else{
            abort();
        }
    }
}
