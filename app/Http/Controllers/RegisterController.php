<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectModel;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        $subject = SubjectModel::get();
        return view('registers.create',compact('subject'));
    }

    public function addSubjectToCart(Request $request, $id){
        // dd(SubjectModel::find($id));
        // $request->session()->forget('cart');
        $subject=SubjectModel::find($id);
        $prevCart =$request->session()->get('cart');
        $cart = new Cart($prevCart);
        $cart->addItem($id ,$subject);
        //update ตะกร้า
        $request->session()->put('cart',$cart);
        dump($cart);
    }
}
