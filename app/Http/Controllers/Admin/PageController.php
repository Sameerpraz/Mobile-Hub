<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = Page::query();
        if($request->keyword){
            $like = '%' . $request->keyword . '%';
            $page->orWhere('title', 'like', $like);
            $page->orWhere('slug', 'like', $like);
        }
//        $pages = Page::all();
        $pages=$page->paginate(20);
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Page::all();
        return view('admin.page.create', compact('parents'));
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
            'title' => 'required|unique:pages',
            'slug' => 'required|unique:pages',
            'details' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            ]);
//dd($request->position);
        $slug = $request->slug? $request->slug : $request->title;
        // $slug = $slug == '/'? $slug : str_slug($slug);

        $page = new Page;
        $page->parent_id = $request->parent_id;
        $page->title = $request->title;
        $page->slug = $slug;
        $page->position = $request->position;
        $page->details = $request->details;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;
        $page->status = $request->status?:0;
        if($request->hasFile('image'))
        {
            $image_name = $page->title . '-'.$page->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/page/',$image_name);
            $page->image = $image_name;

        }
        $page->save();

        return redirect()->route('pages.index')->with('success', 'page added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $parents = Page::all();
        return view('admin.page.edit', compact('parents', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required|unique:pages,title,' . $page->id,
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'details' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            ]);

        $slug = $request->slug? $request->slug : $request->title;
        // $slug = $slug == '/'? $slug : str_slug($slug);

        $page->parent_id = $request->parent_id;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->position = $request->position;
        $page->details = $request->details;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;
        $page->save();

        if ($request->hasFile('image')) {
            if($page->image && file_exists(public_path('uploads/page/'.$page->image))){
                unlink(public_path('uploads/page/'.$page->image));
            }
            $image_name = $page->title . '-'.$page->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/page/', $image_name);
            $page->image = $image_name;
            $page->save();
        }

        return redirect()->route('pages.index')->with('success', 'Page saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page && $page->slug <> '/'){
            if($page->image){
                $image = public_path('uploads/page/' . $page->image);
                if(file_exists($image)){
                    unlink($image);
                }
            }

            $page->delete();
            return redirect()->route('pages.index')->with('success', 'Page deleted.');
        }else{
            return redirect()->route('pages.index')->with('error', 'Error while deleting page.');
        }
    }
    public function photodelete(Page $page)
    {
        if($page && $page->image)
        {
            if(file_exists(public_path('/uploads/page/'.$page->image)))
            {
                unlink(public_path('/uploads/page/'.$page->image));
            }
            $page->image = null;
            $page->save();
        }
        return redirect()->back()->with('success','Image Deleted');
    }
}
