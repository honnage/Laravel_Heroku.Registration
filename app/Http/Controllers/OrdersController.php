<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\SubjectModel;
use App\DetailModel;
use App\OrderModel;

class OrdersController extends Controller
{
    public function show(){
        $id = Auth::user()->id;
        $details = DB::table('details')
        ->where('details.user_id','=',$id)
        ->get();

        $orders = DB::table('orders')
        ->where('orders.user_id','=',$id)
        ->get();

        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return redirect('home',['cartItems'=>$cart],compact('orders','details','subject'));
        } elseif($orders){
            return view('orders.show',compact('orders','details','subject'));
        }else{
            return redirect('home');
        }
    }

    public function details($id){
        $orders = DB::table('orders')
        ->where('orders.id','=',$id)
        ->get();

        $orderitems = DB::table('orderitems')
        ->join('subjects','subjects.code','=','orderitems.item_code')
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

    public function paymentNotification($id){
        // $orders = DB::table('orders')
        // // ->join('orderitems','orderitems.order_id','=','orders.order_id')
        // // ->join('subjects','subjects.code','=','orderitems.item_code')
        // ->where('orders.order_id','=',$id)
        // ->select('*','orders.order_id as OrdID')
        // ->get();
        // return view('orders.paymentNotification',compact('orders'));

        // $orders = DB::table('orders')
        // // ->join('subjects','subjects.code','=','orderitems.item_code')
        // ->where('orders.order_id','=',$id)
        // ->get();

        // // dd($orders);
        // return view('orders.paymentNotification',compact('orders'));

;

        $orders = DB::table('orders')
        ->where('orders.user_id','=',$id)
        ->get();



        return view('orders.paymentNotification',compact('orders'));

    }
}
