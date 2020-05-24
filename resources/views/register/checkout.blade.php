@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                ไม่สามารถเพื่มข้อมูลได้ <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลทำรายการ </strong></div>
                <form action="/registers/createOrder/{{$users->id}}" method="post" >
                    {{csrf_field()}}
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เลขบัตรประชาชน</nav>
                            <input type="text" class="form-control col-sm-4" name="code_id" id="code_id" value="{{$details->code_id}}" readonly>

                            <nav class="col-sm-2">Username</nav>
                            <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin"  value="{{$users->username}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">Firstname</nav>
                            <input type="text" class="form-control col-sm-4" name="Firstname_TH" id="Firstname_TH" placeholder="เช่น: Test"  value="{{$details->Firstname_TH}}" readonly>

                            <nav class="col-sm-2">Lastname</nav>
                            <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin"  value="{{$details->Lastname_TH}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ชื่อ</nav>
                            <input type="text" class="form-control col-sm-4" name="Firstname_EN" id="Firstname_EN" placeholder="เช่น: ทดสอบ"  value="{{$details->Firstname_EN}}" readonly>

                            <nav class="col-sm-2">นามสกุล</nav>
                            <input type="text" class="form-control col-sm-4" name="Lastname_EN" id="Lastname_EN" placeholder="เช่น: แอดมิน"  value="{{$details->Lastname_EN}}" readonly>
                        </div>


                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                            <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000" value="{{$details->phone}}" readonly>

                            <nav class="col-sm-2">Email</nav>
                            <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000" value="{{$users->email}}" readonly>

                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ที่อยู่</nav>
                            <input type="text" class="form-control col-sm-10" name="address" id="address" placeholder="เช่น: Test" value="{{$details->address}}" readonly>
                        </div>
                    </div>

                    <div class="table-responsive cart_info my-2">
                        <table class="table table-condensed" >
                            <thead>
                                <tr class="cart_menu" style="background-color: rgb(6, 154, 223); color: white">
                                    <td class="image"><center>รหัสวิชา</center></td>
                                    <td class="description"><center>ชื่อวิชา</center></td>
                                    <td class="price"><center>ราคา</center></td>
                                    <td class="quantity"><center>จำนวน</center></td>
                                    <td class="total"><center>ราคารวม</center></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems->items as $item)
                                <tr>
                                    <td class="cart_product">
                                        <strong>{{Str::limit( $item['data']['code'],50 )}}</strong>
                                    </td>
                                    <td class="cart_description">
                                        <strong><a href="/register/create">{{ $item['data']['nameTH'] }}</a></strong>
                                        <p>{{Str::limit( $item['data']['nameEN'],50 )}}</p>
                                        {{-- <p>{{Str::limit( $item['data']['name'],50 )}}</p> --}}
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($item['data']['price'],2) }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <center>
                                        <div class="cart_quantity_button">
                                            {{-- <strong><a href="/registers/decrementCart/{{$item['data']['id']}}"><img src="{{ asset('images/minus.png') }}" width="25" height="25"></a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                            {{ $item['quantity'] }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{-- <strong><a  href="/registers/incrementCart/{{$item['data']['id']}}"><img src="{{ asset('images/plus.png') }}" width="25" height="25"></a></strong>&nbsp; --}}
                                        </div>
                                        </center>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"> {{ number_format($item['totalSingle'],2)  }} </p>
                                    </td>
                                    {{-- <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            onclick="return confirm('คุณต้องการลบรายการสินค้าหรือไม่ ?')"
                                            href="/registers/cart/deleteFromCart/{{$item['data']['id']}}">
                                            <img src="{{ asset('images/interface.png') }}" width="30" height="30">
                                        </a>
                                    </td> --}}

                                </tr>
                                @endforeach
                                <tr>
                                    <th colspan="4"><label>จำนวนรายการทั้งหมด</label></th>
                                    <th colspan="1">{{$cartItems->totalQuantity}}</th>
                                </tr>
                                <tr>
                                    <th colspan="4"><label>ยอดรวมเงินทั้งหมด</label></th>
                                    <th colspan="1">{{ number_format($cartItems->totalPrice)}}</th>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <a href="/registers/cart"  class="btn btn-primary col-sm-1">ย้อนกลับ f</a>
                        <button type="submit" name="submit" class="btn btn-success col-sm-2 ">ลงทะเบียน</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
