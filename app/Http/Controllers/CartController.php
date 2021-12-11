<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    //

    public function addToCart(Request $request)
    {
        $addToCart = new cart;
        $addToCart->product_id = $request->product_id;
        $addToCart->qty = 1;
        $addToCart->ip = $_SERVER['REMOTE_ADDR'];
        $addToCart->save();
    }

    public function loadCartCount()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $cart = cart::where('ip',$ip)->get();
        return json_encode([
            'status' => 'success',
            'data' => count($cart)
        ]);
    }

    public function save_order(Request $request)
    {
        $createid = time();
        $orderid = (int)substr($createid, 6);
        $ip = $_SERVER['REMOTE_ADDR'];
        $cart = cart::where('ip',$ip)->get();
        foreach($cart as $value){
            $saveOrder = new order;
            $saveOrder->name = $request->name;
            $saveOrder->email = $request->email;
            $saveOrder->phone = $request->phone;
            $saveOrder->address = $request->address;
            $saveOrder->product_id = $value->product_id;
            $saveOrder->qty = $value->qty;
            $saveOrder->order_id = $orderid;
            if($saveOrder->save()){
                DB::delete('delete from carts where ip = ?', [$ip]);
            }
        }
        Mail::to($request->email)
            ->send(new OrderNotification());
        return json_encode([
            'status' => 'success',
            'message' => 'Order Completed Successfully'
        ]);
    }

}
