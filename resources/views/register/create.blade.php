@extends('layouts.app')

@section('content')

<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card my-1">
                <div class="card-header" style="background-color: #494B4B; color: white"><strong> ข้อมูลวิชาที่จัดสอบ </strong></div>
                    {{-- <div class="card-body"> --}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><center>ชื่อย่อ</center></th>
                                <th scope="col"><center>ชื่อภาษาไทย</center></th>
                                <th scope="col"><center>ชื่อภาษาอังกฤษ</center></th>
                                <th scope="col"><center>ราคา</center></th>
                                <th scope="col"><center>ลงทะเทียน</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($subject as $data)
                                <tr>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->nameTH}}</td>
                                    <td>{{$data->nameEN}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>
                                        <center><a href="/register/addToCart/{{$data->id}}"><img src="{{ asset('images/store_107529.png') }}" width="30" height="30"></a></center>
                                        {{-- <center><a href="/register/addToCart/{{$data->id}}" class="btn btn-success">Add to cart</a></center> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/home"  class="btn btn-primary col-sm-2">ย้อนกลับ</a>

                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
