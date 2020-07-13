<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function cart()
    {
       return view('front.pages.cart');
    }

    public function wishlist()
    {
       return view('front.pages.wishlist');
    }

    public function orders()
    {
       return view('front.pages.orders');
    }

    public function home()
    {
       return view('front.pages.home');
    }

    public function category($id)
    {
       return view('front.pages.category');
    }

    public function product($id)
    {
       return view('front.pages.product');
    }

    public function checkout()
    {
       return view('front.pages.checkout');
    }

    public function compare()
    {
       return view('front.pages.compare');
    }
    
    public function profile()
    {
       return view('front.pages.profile');
    }
}
