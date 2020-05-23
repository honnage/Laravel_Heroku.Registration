<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectModel;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\UserModel;
use App\DetailModel;

// use Symfony\Component\HttpFoundation\Session\Session;

class RegisterController extends Controller
{
    public function create(){
        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('register.create',['cartItems'=>$cart],compact('subject'));
        } else {
            return redirect('/home');
        }

        // return view('register.create');
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
        return redirect('registers/cart');
    }

    //แสดงผลข้อมูล
    public function showCart(){
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('register.showCart',['cartItems'=>$cart]);
        } else {
            return redirect('/home');
        }
    }

    //ลบรายการ
    public function deleteFromCart(Request $request,$id){
        $cart = $request->session()->get('cart');
        if(array_key_exists($id, $cart->items)){
            unset($cart->items[$id]); //ลบข้อมูลสินค้าในตะกร้า ตามไอที ที่ตรงกัน
        }
        // สินค้าคงเหลือ
        $afterCart = $request->session()->get('cart');
        $updateCart = new Cart($afterCart);
        $updateCart->updatePriceQuantity();
        $request->session()->put('cart',$updateCart);
        return redirect('/registers/cart');
    }

    //กดปุ่มบวก แล้วเพื่มจำนวนรายการ
    public function incrementCart(Request $request, $id){
        $subject=SubjectModel::find($id);
        $prevCart =$request->session()->get('cart');
        $cart = new Cart($prevCart);
        $cart->addItem($id ,$subject);
        $request->session()->put('cart',$cart);
        return redirect('registers/cart');
    }

   //กดปุ่มลบ แล้วเพื่มจำนวนรายการ
    public function decrementCart(Request $request, $id){
        $subject=SubjectModel::find($id);
        $prevCart =$request->session()->get('cart');
        $cart = new Cart($prevCart);
        //เข้าถึง quantity รายการที่เลือก
        if($cart->items[$id]['quantity'] > 1){
            $cart->items[$id]['quantity'] = $cart->items[$id]['quantity'] - 1; //ลบจำนวน รายการสินค้าใหม่
            $cart->items[$id]['totalSingle'] = $cart->items[$id]['quantity'] * $subject['price']; //คำนวนราคา รายการสินค่าใหม่
            $cart->updatePriceQuantity();
            $request->session()->put('cart',$cart);
        }else{
            session()->flash("warning","ต้องมีจำนวนรายการอย่าง 1 รายการ");
        }
        return redirect('registers/cart');
    }

    public function checkout($id){
        $users = UserModel::find($id);
        $details = DetailModel::find($id);
        return view('register.checkout',compact('users','details'));
    }


}
