<?php

namespace App\Http\Controllers\Admin;

use App\attribute;
use App\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeController extends Controller
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
        $attributes=attribute::all();
        return view('admin.attribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
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
           'name'=>'required|unique:attributes,name',
       ]);
       $attribute=new attribute();
       $attribute->name=$request->name;
       $attribute->save();
       return redirect('/admin/attribute');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(attribute $attribute)
    {
        return view('admin.attribute.edit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,attribute $attribute)
    {
        $this->validate($request,[
            'name'=>'required|unique:attributes,name,'.$attribute->id,
        ]);
        $attribute->name=$request->name;
        $attribute->save();
        return redirect('/admin/attribute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(attribute $attribute)
    {
        $attribute->delete();
        return back();
    }
    public function forcedelete($id)
    {
        attribute::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }
    public function restore($id)
    {
        attribute::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    public function deleteattributes()
    {
        $attributes=attribute::onlyTrashed()->orderby('id','desc')->get();
        return view('admin.attribute.deleteattribute',compact('attributes'));
    }
}
