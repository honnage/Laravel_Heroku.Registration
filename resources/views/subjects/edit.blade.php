@extends('layouts.admin')

@section('body')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                ไม่สามารถเพื่มข้อมูลได้ <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>แก้ไขข้อมูล </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('subjects.update',$subject->id) }}" method="post" >
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-inline">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อภาษาไทย</nav>
                                <input type="text" class="form-control col-sm-10" name="nameTH" id="nameTH" value="{{$subject->nameTH}}">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อภาษาอังกฤษ</nav>
                                <input type="text" class="form-control col-sm-10" name="nameEN" id="nameEN" value="{{$subject->nameEN}}">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อย่อ</nav>
                                <input type="text" class="form-control col-sm-2" name="code" id="code" value="{{$subject->code}}">

                                <nav class="col-sm-2">ค่าสมัคร</nav>
                                <input type="text" class="form-control col-sm-3" name="price" id="price" value="{{number_format($subject->price)}}">
                                <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                                <button type="submit" name="submit" class="btn btn-success col-sm-2">อัพเดท</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card my-5">
                <div class="card-header" style="background-color: black; color: white"><strong> ข้อมูลวิชาที่จัดสอบ </strong></div>
                    {{-- <div class="card-body"> --}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><center>ชื่อย่อ</center></th>
                                <th scope="col"><center>ชื่อภาษาไทย</center></th>
                                <th scope="col"><center>ชื่อภาษาอังกฤษ</center></th>
                                <th scope="col"><center>ราคา</center></th>
                                <th scope="col"><center>จำนวน</center></th>
                                {{-- <th scope="col"><center>ตัวดำเนิดการ</center></th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->nameTH}}</td>
                                    <td>{{$data->nameEN}}</td>
                                    <td>{{number_format($data->price)}}</td>
                                    <td>

                                    </td>
                                    {{-- <td>
                                        <form action="" method="POST">
                                            <a href="/Admin/editSubject/{{$data->id}}" class="btn btn-primary">แสดง</a>
                                            <a href="/Admin/editSubject/{{$data->id}}" class="btn btn-warning">แก้ไข</a>
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="ลบ" data-name="{{$data->name}}" class="btn btn-danger deleteform">
                                        </form>
                                    </td> --}}
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
