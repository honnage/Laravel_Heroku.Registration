<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\SubjectModel;

class OrdersController extends Controller
{
    public function show($id){
        $orders = DB::table('orders')
        ->where('orders.user_id','=',$id)
        ->get();

        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('home',['cartItems'=>$cart],compact('orders'));
        } else {
            return view('orders.show',compact('orders'));
        }
    }

    public function details($id){
        $orders = DB::table('orders')
        ->where('orders.order_id','=',$id)
        ->get();

        $orderitems = DB::table('orderitems')
        ->where('orderitems.order_id','=',$id)
        ->get();

        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('home',['cartItems'=>$cart],compact('orders','orderitems'));
        } else {
            return view('orders.detail',compact('orders','orderitems'));
        }
    }
}
