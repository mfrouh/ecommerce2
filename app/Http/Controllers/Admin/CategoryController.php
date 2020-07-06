<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }
    public function index()
    {
        $categories=category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required|unique:categories,name',
           'image'=>'required|image',
           'active'=>'required|between:0,1',
       ]);
       $category=new category();
       $category->name=$request->name;
       if ($request->image) {
        $category->image=sorteimage('storage/category',$request->image);
       }
       $category->active=$request->active;
       $category->save();
       return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,category $category)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories,name,'.$category->id,
            'image'=>'image|nullable',
            'active'=>'required|between:0,1',
        ]);
        $category->name=$request->name;
        if ($request->image) {
         $category->image=sorteimage('storage/category',$request->image);
        }
        $category->active=$request->active;
        $category->save();
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return back();
    }
    public function forcedelete($id)
    {
        category::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }
    public function restore($id)
    {
        category::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    public function deletecategories()
    {
        $categories=category::onlyTrashed()->orderby('id','desc')->get();
        return view('admin.category.deletecategory',compact('categories'));
    }

}
