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
                                    <th></th>
                                    <th></th>
                                    {{-- <th scope="row">{{$data->item_code}}</th>
                                    <th scope="row">{{$data->item_code}}</th> --}}
                                    <td>{{number_format($data->item_price)}}</td>
                                    {{-- <td><center><label style="color: red">{{$data->status}}</label><center></td> --}}

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
