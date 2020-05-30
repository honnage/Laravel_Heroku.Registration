@extends('layouts.app')

@section('content')

<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> รายการใบลงทะเบียน </strong></div>
                    {{-- <div class="card-body"> --}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><center>วัน-เวลา ลงทะเบียน</center></th>
                                <th scope="col"><center>รหัสรายการ</center></th>
                                <th scope="col"><center>ราคา</center></th>
                                <th scope="col"><center>สถานะ</center></th>
                                <th scope="col"><center>ตัวดำเนิดการ</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $data)
                                <tr>
                                    <th scope="row">{{$data->date}}</th>
                                    <th scope="row">{{$data->id}}</th>
                                    <td>{{number_format($data->price)}}</td>
                                    <td>
                                        <center>
                                        @if($data->status == 0)
                                            <label>ยังไม่ได้ชำระเงิน</label>
                                        @elseif($data->status == 1)
                                            <label>รอตรวจสอบ</label>
                                        @elseif($data->status == 3)
                                            <label>ชำระเงินแล้ว</label>
                                        @else
                                            <label>แก้ไขใหม่</label>
                                        @endif
                                        <center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/order/details/{{$data->id}}" class="btn btn-primary col-sm-4">รายละเอียด</a>
                                                @if($data->status == 0)
                                                    <a href="/order/paymentNotification/{{$data->id}}" class="btn btn-info col-sm-4">แจ้งชำระเงิน</a>
                                                @elseif($data->status == 2)
                                                    {{-- <a href="/order/editImage/{{$data->id}}" class="btn btn-warning col-sm-4">แจ้งชำระใหม่</a> --}}
                                                    <a href="/order/paymentNotification/{{$data->id}}" class="btn btn-warning col-sm-4">ชำระเงินแล้ว</a>
                                                @elseif($data->status == 3)
                                                    <a href="/order/paymentNotification/{{$data->id}}" class="btn btn-success col-sm-4">ชำระเงินแล้ว</a>
                                                @else
                                                    <a href="/order/paymentNotification/{{$data->id}}" class="btn btn-info col-sm-4">กำลังตรวจสอบ</a>
                                                @endif
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <a class="btn btn-primary check_out col-sm-1" href="/home">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
