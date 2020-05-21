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
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <strong> <a href="/home">Home</a> &nbsp;&nbsp;&nbsp; ตะกร้ารายการสินค้า</strong>
            </ol>
        </div>
        <div class="card">
        <div class="table-responsive cart_info">
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
                            <p>{{Str::limit( $item['data']['code'],50 )}}</p>
                        </td>
                        <td class="cart_description">
                            <strong><a href="/register/create">{{ $item['data']['nameTH'] }}</a></strong>
                            <p>{{Str::limit( $item['data']['nameEN'],50 )}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($item['data']['price'],2) }}</p>
                        </td>
                        <td class="cart_quantity">
                            <center>
                            <div class="cart_quantity_button">
                                <strong><a class="cart_quantity_down" href="/products/cart/decrementCart/{{$item['data']['id']}}"> - </a></strong>&nbsp;
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['quantity'] }}" autocomplete="off" size="2">&nbsp;
                                <strong><a class="cart_quantity_up" href="/products/cart/incrementCart/{{$item['data']['id']}}"> + </a></strong>&nbsp;
                            </div>
                            </center>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"> {{ number_format($item['totalSingle'],2)  }} </p>
                        </td>
                        <td class="cart_delete">
                            {{-- <a class="cart_quantity_delete"
                                onclick="return confirm('คุณต้องการลบรายการสินค้าหรือไม่ ?')"
                                href="/registers/cart/deleteFromCart/{{$item['data']['id']}}">
                                <img src="{{ asset('images/interface.png') }}" width="30" height="30">
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="card my-4">
            <div class="card-header" style="background-color: rgb(6, 154, 223); color: white"><strong> ยอดรวมรายการ </strong></div>
            {{-- <div class="card-body"> --}}
            <table class="table table-striped">
                <thead>
                {{-- @foreach($cartItems as $data) --}}
                    <tr>
                        <th scope="col" class="col-sm-10"><label>จำนวนรายการ</label></th>
                        <th scope="col">{{$cartItems->totalQuantity}}</th>
                    </tr>
                    <tr>
                        <th scope="col" class="col-sm-10"><label>ยอดรวมเงินทั้งหมด</label></th>
                        <th scope="col">{{ number_format($cartItems->totalPrice)}}</th>
                    </tr>

                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="total_area">
                <a class="btn btn-success update" href="">Update</a>
                <a class="btn btn-primary check_out" href="/products/checkout">Check Out</a>
            </div><br>
        </div>
    </div>
</section>
@endsection
