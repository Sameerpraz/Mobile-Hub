<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['galleries'] = Gallery::all();
        return view('admin.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'image' => 'required',
        ]);

        $gallery = new Gallery;
        $gallery_id=$gallery->id;
        if ($request->hasFile('image')) {
            $image_name = 'gallery-'.basename($request->file('image')->getClientOriginalName(), '.'.$request->file('image')->getClientOriginalExtension())
            .'-'.date('d'). '.'.$request->image->extension();
            $path = $request->image->move('uploads/gallery/', $image_name);
            $gallery->image = $image_name;

        }
        $gallery->image_caption = $request->image_caption;
        $gallery->order_by = (Gallery::max('order_by') + 1);
        $gallery->save();
        return redirect()->route('galleries.index')->with('success', 'Gallery added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            // 'image' => 'required',
        ]);

        $gallery->image_caption = $request->image_caption;
        $gallery->save();

        if ($request->hasFile('image')) {
            if($gallery->image && file_exists(public_path('uploads/gallery/'.$gallery->image))){
                unlink(public_path('uploads/gallery/'.$gallery->image));
            }
            $image_name = 'gallery-'.$gallery->id . '.'.$request->image->extension();
            $path = $request->image->move('public/uploads/gallery/', $image_name);
            $gallery->image = $image_name;
            $gallery->save();
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery){

            if($gallery->image){
                $image = public_path('uploads/gallery/' . $gallery->image);
                if(file_exists($image)){
                    unlink($image);
                }
            }

            if($gallery->delete()){
                return redirect()->route('galleries.index')->with('success', 'Gallery deleted.');
            }else{
                return redirect()->route('galleries.index')->with('error', 'Error while deleting Gallery.');
            }

        }else{
            abort();
        }
    }
}
