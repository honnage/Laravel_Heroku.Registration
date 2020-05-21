<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectModel;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Session\Session;

class RegisterController extends Controller
{
    public function create(){
        $subject = SubjectModel::get();
        return view('register.create',compact('subject'));
    }

    public function addSubjectToCart(Request $request, $id){
        // $request->session()->forget('cart');
        // dd(SubjectModel::find($id));
        $subject=SubjectModel::find($id);
        $prevCart =$request->session()->get('cart');
        $cart = new Cart($prevCart);
        $cart->addItem($id ,$subject);
        //update ตะกร้า
        $request->session()->put('cart',$cart);
        // dump($cart);
        return redirect('home');
    }

    public function showCart(){ //แสดงผลข้อมูล
        $cart=Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){
            return view('register.showCart',['cartItems'=>$cart]);
        } else {
            return redirect('/home');
        }
    }

    // public function deleteFromCart(Request $request,$id){
    //     $cart=$request->session()->get('cart');
    //     if(array_key_exists($id, $cart->items)){
    //         //ลบข้อมูล
    //         unset($cart->items[$id]);
    //         return redirect('/registers/cart');
    //     }
    // }

}
