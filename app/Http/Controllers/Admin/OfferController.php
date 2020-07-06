<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\offer;
use App\product;
use Illuminate\Http\Request;

class OfferController extends Controller
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
        $offers=offer::all();
        return view('admin.offer.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(product $product)
    {
        $product=product::where('id',$product->id)->first();
        return view('admin.offer.create',compact('product'));
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
           'type'=>'required',
           'product_id'=>'required|unique:offers,product_id',
           'value'=>'required',
           'start_offer'=>'required',
           'end_offer'=>'required',
           'message'=>'required',
       ]);
       $offer=new offer();
       $offer->product_id=$request->product_id;
       $offer->type=$request->type;
       $offer->value=$request->value;
       $offer->start_offer=$request->start_offer;
       $offer->end_offer=$request->end_offer;
       $offer->message=$request->message;
       $offer->save();
       return redirect('/admin/offer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(offer $offer)
    {
        return view('admin.offer.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,offer $offer)
    {
        $this->validate($request,[
            'type'=>'required',
            'product_id'=>'required|unique:offers,product_id,'.$offer->product_id,
            'value'=>'required',
            'start_offer'=>'required',
            'end_offer'=>'required',
            'message'=>'required',
        ]);
        $offer->product_id=$request->product_id;
        $offer->type=$request->type;
        $offer->value=$request->value;
        $offer->start_offer=$request->start_offer;
        $offer->end_offer=$request->end_offer;
        $offer->message=$request->message;
        $offer->save();
        return redirect('/admin/offer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(offer $offer)
    {
        $offer->delete();
        return back();
    }
    public function forcedelete($id)
    {
        offer::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }
    public function restore($id)
    {
        offer::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    public function deleteoffers()
    {
        $offers=offer::onlyTrashed()->orderby('id','desc')->get();
        return view('admin.offer.deleteoffer',compact('offers'));
    }
}
