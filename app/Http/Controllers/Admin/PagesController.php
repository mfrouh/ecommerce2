<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\order;
use App\order_details;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
      return view('admin.pages.dashboard');
    }

    public function orders()
    {
        $orders=order::all();
        return view('admin.pages.orders',compact('orders'));
    }

    public function order_details($id)
    {
        $order_details=order_details::where('order_id',$id)->get();
        return view('admin.pages.order_details',compact('order_details'));
    }

    public function clients()
    {
        $clients=User::all();
        return view('admin.pages.clients',compact('clients'));
    }
}
