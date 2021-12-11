<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

























    public function cart()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $getCartCheckout  = cart::where('ip',$ip)->orderBy('id','DESC')->get();
        return view('cart',['cart'=>$getCartCheckout]);
    }

    public function products()
    {
        $getProducts = product::orderBy('id','DESC')->get();
        return view('speacialMenu',['products'=>$getProducts]);
    }

    
}
