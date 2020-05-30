@extends('layouts.admin')

@section('body')

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
                                {{-- <th scope="col"><center>รหัสผู้ลงทะเบียน</center></th> --}}
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
                                    {{-- <th scope="row">{{$data->user_id}}</th> --}}
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
                                                <a href="/orders/dashboardDetail/{{$data->id}}" class="btn btn-warning col-sm-4">แก้ไข</a>
                                                {{-- <a href="/orders/editPayment/{{$data->id}}" class="btn btn-success col-sm-4">ชำระเงิน</a> --}}
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
