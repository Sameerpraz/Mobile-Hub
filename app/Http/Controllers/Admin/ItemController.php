<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items=Item::query();
        if($request->category){
            $items=$items->where('category_id',$request->category)->orderby('order_by')->paginate(1000);
        }
        else{
            $items = $items->paginate(15);
        }
        $categories = Category::all();
        return view('admin.item.index', compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.item.create', compact('categories'));
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
            'title' => 'required|unique:items',            
            'category_id' => 'required',
            'details' => 'required',
            ]);

        $slug = $request->slug? $request->slug : $request->title;
        $slug = $slug == '/'? $slug : str_slug($slug);       
        
        $item = new Item;
        $item->title = $request->title;
        $item->slug = $slug;
        $item->category_id = $request->category_id;
        $item->details = $request->details;
        $item->price = $request->price;

        $item->order_by=(Item::where('category_id', $request->category_id)->max('order_by') + 1);
        $item->save();

        if ($request->hasFile('image')) {
            $image_name = $item->slug . '-'.$item->id . '.'.$request->image->extension();
            $path = $request->image->move('public/uploads/items/', $image_name);
            $item->image = $image_name;
            $item->save();
        }

        return redirect()->route('items.index')->with('success', 'Item added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

        $this->validate($request, [
            'title' => 'required|unique:items,title,' . $item->id,
            'category_id' => 'required',
            'details' => 'required',
            ]);

        $slug = $request->slug? $request->slug : $request->title;
        $slug = $slug == '/'? $slug : str_slug($slug);       
        
        // $item = new Item;
        $item->title = $request->title;
        $item->slug = $slug;
        $item->category_id = $request->category_id;
        $item->details = $request->details;
        $item->price = $request->price;

        $item->save();

        if ($request->hasFile('image')) {
            $image_name = $item->slug . '-'.$item->id . '.'.$request->image->extension();
            $path = $request->image->move('public/uploads/items/', $image_name);
            $item->image = $image_name;
            $item->save();
        }

        return redirect()->route('items.index')->with('success', 'Item saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item && $item->delete()){
            return redirect()->route('items.index')->with('success', 'Item deleted.');
        }else{
            return redirect()->route('items.index')->with('error', 'Error while deleting Item.');
        }
    }
    public function order(Request $request)
    {
        $i=1;
        foreach ($request->data as $key => $value) {
            $item= Item::find($value);
            $item->order_by=$i;
            $item->save();
            $i++;

        }
    }
}

