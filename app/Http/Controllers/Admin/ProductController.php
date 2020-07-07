<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\product;
use App\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $products=product::orderby('id','desc')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'category_id'=>'required|numeric',
            'name'=>'required',
            'description'=>'required',
            'active'=>'required|between:0,1',
            'images'=>'required',
            'price'=>'required',
        ]);
        $product=new product();
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->active=$request->active;
        $product->price=$request->price;
        $product->slug=$request->name.rand(1111,9999);
        $product->save();
           if ($request->images) {
            foreach ($request->images as $key =>$value ) {
                $product->gallery()->create(['url'=>sorteimage('storage/product',$value)]);
            }
           }
           if ($request->tags) {
            foreach (explode(',',$request->tags) as $key =>$value ) {
                $tag=tag::where('name',$value)->first();
                if(!$tag)
                {
                    $tag=tag::create(['name'=>$value]);
                }
                $arr[]=$tag->id;
            }
            $product->tags()->sync($arr);
           }
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
      return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $this->validate($request,[
            'category_id'=>'required|numeric',
            'name'=>'required',
            'description'=>'required',
            'active'=>'required|between:0,1',
            'images'=>'nullable',
            'price'=>'required',
        ]);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->active=$request->active;
        $product->price=$request->price;
        $product->slug=$request->name.rand(1111,9999);
        $product->save();
        if ($request->images) {
            $arr=array();
            foreach ($request->images as $key =>$value ) {
                $product->gallery()->create(['url'=>sorteimage('storage/product',$value)]);
            }
           }
        if ($request->tags) {
            foreach (explode(',',$request->tags) as $key =>$value ) {
                $tag=tag::where('name',$value)->first();
                if(!$tag)
                {
                    $tag=tag::create(['name'=>$value]);
                }
                $arr[]=$tag->id;
            }
            $product->tags()->sync($arr);
           }
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return back();
    }
    public function forcedelete($id)
    {

        product::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }
    public function restore($id)
    {
        product::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    public function deleteproducts()
    {
      $products=product::onlyTrashed()->orderby('id','desc')->get();
      return view('admin.product.deleteproduct',compact('products'));
    }


}
