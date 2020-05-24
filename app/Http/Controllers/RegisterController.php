<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\SubjectModel;
use App\UserModel;
use App\DetailModel;
use App\Cart;
use App\OrderModel;

// use Symfony\Component\HttpFoundation\Session\Session;

class RegisterController extends Controller
{
    public function create(){
        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('register.create',['cartItems'=>$cart],compact('subject'));
        } else {
            // return redirect('/home');
            return view('register.create',compact('subject'));
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
        // if($users->id ==  $details->user_id){
        // return view('register.checkout',compact('users','details'));
        // }
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('register.checkout',['cartItems'=>$cart],compact('users','details'));
        } else {
            // return redirect('/home');
        }
    }

    public function createOrder(Request $request, $id){
        $cart = Session::get('cart');
        $users = UserModel::find($id);
        $details = DetailModel::find($id);
        // dd($users->email, $details->Firstname_TH);

        if($cart){
            //เพื่มแบบ model
            $date=date("Y-m-d H:i:s");
            $order = new OrderModel();
            $order->date = $date;
            $order->price = $cart->totalPrice;
            $order->status = "Not Paid";
            $order->Firstname_TH = $details->Firstname_TH;
            $order->Lastname_TH = $details->Lastname_TH;
            $order->Firstname_EN = $details->Firstname_EN;
            $order->Lastname_EN = $details->Lastname_EN;
            $order->address = $details->address;
            $order->phone = $details->phone;
            $order->email = $users->email;
            $order->user_id = Auth::user()->id;
            $order->save();

            //เพื่มแบบ DB
            // DB::table('Dormitory')
            // ->insert([
            // 'date' => $date,
            // 'price' => $cart->totalPrice,
            // 'status' => "Not Paid",
            // 'Firstname_TH' => $details->Firstname_TH,
            // 'Lastname_TH' => $details->Lastname_TH,
            // 'Firstname_EN' => $details->Firstname_EN,
            // 'Lastname_EN' => $details->Lastname_EN,
            // 'address' => $details->address,
            // 'phone' => $details->phone,
            // 'email' => $users->email,
            // 'user_id' => Auth::user()->id,
            // ]);

            $order_id = DB::getPDO()->lastInsertId();
            foreach($cart->items as $item){
                $item_id = $item['data']['id'];
                $item_code = $item['data']['code'];
                $item_price = $item['data']['price'];
                $item_amoun = $item['quantity'];
                $newOrderItem = array(
                    "item_id" => $item_id,
                    "order_id" => $order_id,
                    "item_code" => $item_code,
                    "item_price" => $item_price ,
                    "item_amoun" => $item_amoun ,
                );
                // dd($item->item_name);
                $create_orderitem = DB::table('orderitems')->insert($newOrderItem);
            }

            $order_id = DB::getPDO()->lastInsertId();
            foreach($cart->items as $item){
                $user_id = Auth::user()->id;
                $code = $item['data']['code'];
                $nameTH = $item['data']['nameTH'];
                $nameEN = $item['data']['nameEN'];
                $status = 0;
                $newRegisters = array(
                    "user_id" => $user_id,
                    "code" => $code,
                    "nameTH" => $nameTH,
                    "nameEN" => $nameEN ,
                    "status" => $status ,
                );
                // dd($item->item_name);
                $create_orderitem = DB::table('register_details')->insert($newRegisters);
            }
            session::forget("cart");

        }
        return redirect('home');
    }

    // public function showPayment(){
    //     $payment_info=Session()->get('payment_info');
    //     if($payment_info['status']=='Not Paid'){
    //         return view("payment.paymentPage",["payment_info"=>$payment_info]);
    //     } else {
    //         return redirect('/home');
    //     }
    // }

}
