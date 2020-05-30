@extends('layouts.app')

@section('content')
@foreach($orders as $order)
@endforeach
<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>ข้อมูลผู้ลงทะเบียน </strong></div>
                <div class="card-body">
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">รหัสใบลงทะเบียน</nav>
                            <input type="text" class="form-control col-sm-4"  value="{{$order->OrID}}" readonly>

                            <nav class="col-sm-2">วันที่ลงทะเบียน</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$order->date}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ราคา</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$order->price}}" readonly>

                            <nav class="col-sm-2">สถานะ</nav>
                            <input type="text" class="form-control col-sm-4"
                            @if($order->status == 0)
                                value="ยังไม่ได้ชำระเงิน"
                            @elseif($order->status == 1)
                                value="รอตรวจสอบ"
                            @elseif($order->status == 3)
                                value="ชำระเงินแล้ว"
                            @else
                                value="แก้ไขใหม่"
                            @endif
                            readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> วิชาที่ลงทะเบียน </strong></div>
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
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <a class="btn btn-primary check_out col-sm-1" href="/order/show/{{$data->id}}">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
