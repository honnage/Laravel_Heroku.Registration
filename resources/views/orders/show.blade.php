@extends('layouts.app')

@section('content')

<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> รายการใบลงทะเบยน </strong></div>
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
                                        @if($data->status == "Not Paid" || $data->status == 0)
                                            <label style="color: red">{{$data->status}}</label>
                                        @elseif($data->status == 1)
                                            <label style="color: rgba(236, 198, 30, 0.753)">{{$data->status}}</label>
                                        @else
                                            <label style="color: rgba(4, 102, 20, 0.753)">{{$data->status}}</label>
                                        @endif
                                        <center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/order/details/{{$data->id}}" class="btn btn-primary col-sm-3">รายละเอียด</a>
                                                <a href="/order/paymentNotification/{{$data->id}}" class="btn btn-success col-sm-3">แจ้งชำระเงิน</a>
                                                @if($data->status == "Not Paid" || $data->status == 0)
                                                    <a href=" " class="btn btn-danger col-sm-3">ยกเลิก</a>
                                                @elseif($data->status == 1)
                                                    <a href=" " class="btn btn-warning col-sm-3">ยกเลิก</a>
                                                @else
                                                    <a href=" " class="btn btn-success col-sm-3">ยกเลิก</a>
                                                @endif
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
