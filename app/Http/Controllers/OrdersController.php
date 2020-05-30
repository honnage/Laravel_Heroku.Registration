<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Resource;
use Illuminate\Support\Facades\Finder;
use App\SubjectModel;
use App\DetailModel;
use App\OrderModel;
use App\OderItemModel;

class OrdersController extends Controller{
    public function dashboard(){
        $orders = DB::table('orders')->get();
        return view('orders.dashboard',compact('orders'));
    }

    public function dashboardDetail($id){
        $orders = DB::table('orders')
        ->join('details','details.id','=','orders.user_id')
        ->join('users','users.id','=','orders.user_id')
        ->select('*','orders.id as OrID','orders.status as OrStatus','details.status as deStatus')
        ->where('orders.id','=',$id)
        ->get();

        $orderitems = DB::table('orderitems')
        ->join('subjects','subjects.code','=','orderitems.item_code')
        ->where('orderitems.order_id','=',$id)
        ->select('*','orderitems.order_id as OrID',)
        ->get();

        return view('orders.dashboardDetail',compact('orderitems','orders'));
    }

    public function editPayment($id){
        $data = OrderModel::find($id);
        return view('orders.editPayment',compact('data'));
    }

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
        ->join('details','details.id','=','orders.user_id')
        ->join('users','users.id','=','orders.user_id')
        ->select('*','orders.id as OrID','orders.status as OrStatus','details.status as deStatus')
        ->where('orders.id','=',$id)
        ->get();

        $orderitems = DB::table('orderitems')
        ->join('subjects','subjects.code','=','orderitems.item_code')
        ->where('orderitems.order_id','=',$id)
        ->get();

        // dd($orderitems);
        $subject = SubjectModel::get();
        $cart = Session::get('cart'); //ดึงข้อมูลตะกร้าสินค้า
        if($cart){ //มีข้อมูล
            return view('home',['cartItems'=>$cart],compact('orderitems','orders'));
        } else {
            return view('orders.detail',compact('orderitems','orders'));
        }
    }

    public function paymentNotification($id){
        $data = OrderModel::find($id);
        return view('orders.paymentNotification',compact('data'));
    }

    public function update(Request $request, $id){
        $orders = OrderModel::find($id);

        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5000', //ชนิดข้อมูลเป็นไฟล์ รูปภาพ นามสกุลไฟล์ jpeg,png,jpg ขนาดไม่ 5000ไบต์
        ]);

        $stringImageReFormat=base64_encode('_'.time()); //เปลี่ยนชื่อภาพใหม่แล้วเข้ารหัส เป็น เวลา
        $ext = $request->file('image')->getClientOriginalExtension(); //แสดงนามสุลกไฟล์
        $imageName = $stringImageReFormat.".".$ext; //ชื่อรูปภาพใหม่ที่เข้ารหัส.นามสกุลไฟล์รูป
        $imageEncoded = File::get($request->image); //เอาภาพไปเก็บในตัวแปล iamgeEncoded

        //upload & insert
        Storage::disk('local')->put('public/product_image/'.$imageName,$imageEncoded);//เก็บที่ตำแหน่งปลายทาง

        //insert
        $orders->image = $imageName;
        $orders->status =  1;
        // dd($imageName);
        $orders->update();
        return redirect('home');
    }

    public function updateStatus(Request $request, $id){
        $request->validate([
            'status'=>'required',
        ]);

        $orders = OrderModel::find($id);
        $orders->status = $request->status;
        $orders->save();
        // dd($request);
        // SubjectModel::find($id)->update($request->all()); //บันทึกแบบทั้งหมด
        return redirect('/orders/dashboard');
    }

    public function showImage($id){
        $data = OrderModel::find($id);
        // dd($id);
        return view('orders.showImage',compact('data'));
    }

    public function showImageAdmin($id){
        $data = OrderModel::find($id);
        return view('orders.showImageAdmin',compact('data'));
    }

    public function updateImage(Request $request, $id){
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5000', //ชนิดข้อมูลเป็นไฟล์ รูปภาพ นามสกุลไฟล์ jpeg,png,jpg ขนาดไม่ 5000ไบต์
        ]);

        if($request->hasFile("image")){
            $orders = OrderModel::find($id);
            $exists = Storage::disk('local')->exists("public/product_image/".$orders->image); //เปลี่ยนภาพ โดยใช้ชื่อเดิม เซ็ดไฟล์ภาพเหมือนกันไหม

            if($exists){ //ถ้าเหมือนกัน ลบภาพทิ้ง
                Storage::delete("public/product_image/".$orders->image);
            }
            $request->image->storeAs("public/product_image/",$orders->image);

            DB::table('orders')
            ->where('orders.id','=',$id )
            ->update([
            'status' => 1,
            ]);


            return redirect('home');
        }

    }
}
