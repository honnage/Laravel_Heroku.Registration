@extends('layouts.admin')

@section('body')
@foreach($orders as $order)
@endforeach
<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>ข้อมูลผู้ลงทะเบียน ID: {{Auth::user()->id}} </strong></div>
                <div class="card-body">
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">Firstname</nav>
                            <input type="text" class="form-control col-sm-4"  value="{{$order->Firstname_TH}}" readonly>

                            <nav class="col-sm-2">Lastname</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$order->Lastname_TH}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ชื่อ</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$order->Firstname_EN}}" readonly>

                            <nav class="col-sm-2">นามสกุล</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$order->Lastname_EN}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$order->phone}}" readonly>

                            <nav class="col-sm-2">Email</nav>
                            <input type="text" class="form-control col-sm-4" value="{{Auth::user()->email}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> รายการใบลงทะเบยน</strong></div>
                    {{-- <div class="card-body"> --}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><center>รหัสวิชา</center></th>
                                <th scope="col"><center>ชื่อวิชาภาษาไทย</center></th>
                                <th scope="col"><center>ชื่อวิชาภาษาอังกฤษ</center></th>
                                <th scope="col"><center>ราคา</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orderitems as $data)
                                <tr>
                                    <th scope="row">{{$data->item_code}}</th>
                                    <th scope="row">{{$data->nameTH}}</th>
                                    <th scope="row">{{$data->nameEN}}</th>
                                    <td>{{number_format($data->item_price)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <a href="/orders/dashboard"  class="btn btn-primary col-sm-2 my-2">ย้อนกลับ</a>
                        <a class="col-sm-7" type="reset"></a>
                        <a class="btn btn-success col-sm-2" href="/order/showImage/{{$data->id}}">แสดงรป</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
