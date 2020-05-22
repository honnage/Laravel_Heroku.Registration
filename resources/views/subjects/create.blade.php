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
                <div class="card-header"><strong>เพื่มวิชา </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/subjects" method="post" >
                        {{csrf_field()}}
                        <div class="form-inline">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อภาษาไทย</nav>
                                <input type="text" class="form-control col-sm-10" name="nameTH" id="nameTH" placeholder="เช่น: ทดสอบ">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อภาษาอังกฤษ</nav>
                                <input type="text" class="form-control col-sm-10" name="nameEN" id="nameEN" placeholder="เช่น: Test">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อย่อ</nav>
                                <input type="text" class="form-control col-sm-2" name="code" id="code" placeholder="เช่: T1">

                                <nav class="col-sm-2">ค่าสมัคร</nav>
                                <input type="text" class="form-control col-sm-4" name="price" id="price" placeholder="เช่น: 50">
                                <button type="submit" name="submit" class="btn btn-success col-sm-2">ยืนยัน</button>
                                {{-- <input type="submit" value="submit"  class="btn btn-success col-sm-2 confirm"> --}}

                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card my-4">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลวิชาที่จัดสอบ </strong></div>
                    {{-- <div class="card-body"> --}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                <th scope="col"><center>ชื่อย่อ</center></th>
                                <th scope="col"><center>ชื่อภาษาไทย</center></th>
                                <th scope="col"><center>ชื่อภาษาอังกฤษ</center></th>
                                <th scope="col"><center>ราคา</center></th>
                                <th scope="col"><center>จำนวน</center></th>
                                <th scope="col"><center>ตัวดำเนิดการ</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($subject as $data)
                                <tr>
                                    {{-- <th scope="row">{{$data->id}}</th> --}}
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->nameTH}}</td>
                                    <td>{{$data->nameEN}}</td>
                                    <td>{{number_format($data->price)}}</td>
                                    <td>    </td>
                                    <td>
                                        <center>
                                        <form action="{{ route('subjects.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{route('subjects.edit',$data->id)}}" class="btn btn-warning">แก้ไข</a>
                                            <input type="submit" value="ลบ" data-name="{{$data->nameTH}}"  data-code="{{$data->code}}" class="btn btn-danger deleteform">
                                        </form>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$subject->links()}} --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
