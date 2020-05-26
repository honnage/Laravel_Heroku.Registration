<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\SubjectModel;
use App\OrderModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $details = DB::table('details')
        ->where('details.user_id','=',$id)
        ->get();

        $user = DB::table('users')->get();
        $orders = DB::table('orders')
        ->where('orders.user_id','=',$id)
        ->get();
        $register_course = DB::table('register_course')
        ->where('register_course.user_id','=',$id)
        ->get();

        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('home',['cartItems'=>$cart],compact('subject','user','details','orders','register_course'));
        } else {
            return view('home',['cartItems'=>$cart],compact('subject','user','details','orders','register_course'));
        }

    }


}
