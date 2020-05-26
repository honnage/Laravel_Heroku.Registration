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
                                <th scope="col"><center>ราคา</center></th>
                                <th scope="col"><center>สถานะ</center></th>
                                <th scope="col"><center>ตัวดำเนิดการ</center></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $data)
                                <tr>
                                    <th scope="row">{{$data->date}}</th>
                                    <td>{{number_format($data->price)}}</td>
                                    <td><center><label style="color: red">{{$data->status}}</label><center></td>
                                    <td>
                                        <center>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/order/details/{{$data->order_id}}" class="btn btn-primary col-sm-3">รายละเอียด</a>
                                                <a href="/order/paymentNotification/{{$data->order_id}}" class="btn btn-success col-sm-3">แจ้งชำระเงิน</a>
                                                @if($data->status == "Not Paid")
                                                    <a href=" " class="btn btn-danger col-sm-3">ยกเลิก</a>
                                                @else
                                                    <a href=" " class="btn btn-warning col-sm-3">ยกเลิก</a>
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
