<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderby('order_by')->paginate(15);
        //$categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::where('parent_id', 0)->get();
        return view('admin.category.create', compact('parents'));
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
            'title' => 'required|unique:categories',            
            'details' => 'required',
            ]);

        $slug = $request->slug? $request->slug : $request->title;
        $slug = $slug == '/'? $slug : str_slug($slug);       
        
        $category = new Category;
        $category->parent_id = $request->parent_id;
        $category->title = $request->title;
        $category->slug = $slug;
        $category->details = $request->details;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        $category->order_by=(Category::max('order_by') + 1);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parents = Category::where('parent_id', 0)->get();
        return view('admin.category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories,title,' . $category->id,
            // 'slug' => 'required|unique:categories,slug,' . $category->id,
            'details' => 'required',
            ]);

        $slug = $request->slug? $request->slug : $request->title;
        $slug = $slug == '/'? $slug : str_slug($slug);

        $category->parent_id = $request->parent_id;
        $category->title = $request->title;
        $category->slug = $slug;
        $category->details = $request->details;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category && $category->delete()){
            return redirect()->route('categories.index')->with('success', 'Category deleted.');
        }else{
            return redirect()->route('categories.index')->with('error', 'Error while deleting Category.');
        }
    }
    public function order(Request $request)
    {
         $i=1;
        foreach ($request->data as $key => $value) {
            $category= Category::find($value);
            $category->order_by=$i;
            $category->save();
            $i++;
        }
    }
}
