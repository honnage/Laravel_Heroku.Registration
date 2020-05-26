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
                                            <a href="/order/details/{{$data->order_id}} " class="btn btn-primary">รายละเอียด</a>
                                            <a href=" " class="btn btn-success">แจ้งชำระเงิน</a>
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