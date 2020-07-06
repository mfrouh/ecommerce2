<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\valueable;
use App\value;

class valueableController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }
    public function index()
    {
        $valueables=valueable::all();
        return view('admin.valueable.index',compact('valueables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(product $product)
    {
        return view('admin.valueable.create',compact('product'));
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
            'attribute_id'=>'required',
            'value'=>'required',
            'product_id'=>'required',
        ]);
        $value =value::where('name',$request->value)->first();
        if(!$value){
        $value = new value();
        $value->name=$request->value;
        $value->save();
        }
        $valueable_1=valueable::where('product_id',$request->product_id)->where('attribute_id',$request->attribute_id)->where('value_id',$value->id)->first();
        if(!$valueable_1)
        {
            $valueable= new valueable();
            $valueable->product_id=$request->product_id;
            $valueable->attribute_id=$request->attribute_id;
            $valueable->value_id=$value->id;
            $valueable->save();
            return redirect('/admin/valueable');
        }
        else
        {
         return back()->with('success','هذه القيمة موجودة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(valueable $valueable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(valueable $valueable)
    {
        return view('admin.valueable.edit',compact('valueable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,valueable $valueable)
    {
        $this->validate($request,[
            'attribute_id'=>'required',
            'value'=>'required',
            'product_id'=>'required',
        ]);
        $value =value::where('name',$request->value)->first();
        if(!$value){
        $value = new value();
        $value->name=$request->value;
        $value->save();
        }
        $valueable_1=valueable::where('product_id',$request->product_id)->where('attribute_id',$request->attribute_id)->where('value_id',$value->id)->first();
        if(!$valueable_1 || $valueable_1==$valueable)
        {
            $valueable->product_id=$request->product_id;
            $valueable->attribute_id=$request->attribute_id;
            $valueable->value_id=$value->id;
            $valueable->save();
            return redirect('/admin/valueable');
        }
        else
        {
         return back()->with('success','هذه القيمة موجودة');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(valueable $valueable)
    {
        $valueable->delete();
        return back();
    }
    public function forcedelete($id)
    {
        valueable::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }
    public function restore($id)
    {
        valueable::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    public function deletevalueables()
    {
        $valueables=valueable::onlyTrashed()->orderby('id','desc')->get();
        return view('admin.valueable.deletevalueable',compact('valueables'));
    }
}
