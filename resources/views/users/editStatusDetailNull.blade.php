
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
                <div class="card-header"><strong>แก้ไขสถานะ </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/UserDetails/update/{{$users->id}}" method="post" >
                        {{csrf_field()}}
                        <div class="form-inline">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">Username</nav>
                                <input type="text" class="form-control col-sm-10" name="username" id="username" value="{{$users->username}}" readonly>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">Email</nav>
                                <input type="text" class="form-control col-sm-10" name="email" id="email" value="{{$users->email}}" readonly>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ID</nav>
                                <input type="text" class="form-control col-sm-2" name="id" id="id" value="{{$users->id}}" readonly>

                                @if(Auth::user()->status == 2 || Auth::user()->id == 1)
                                <nav class="col-sm-2">สถานะ</nav>
                                <div class = "col-sm-3">
                                    <select class="form-control " name="status">
                                        @if( $users->id == "1")
                                            <option value="{{$users->status}}">ปัจจุบัน: Admin</option>
                                            <option value="1">แก้ไขเป็น: Moderator</option>
                                            <option value="0">แก้ไขเป็น: User</option>
                                        @elseif( $users->status == "0")
                                            <option value="{{$users->status}}">ปัจจุบัน: User</option>
                                            <option value="1">แก้ไขเป็น: Moderator</option>
                                            <option value="2">แก้ไขเป็น: Admin</option>
                                        @elseif( $users->status == "1")
                                            <option value="{{$users->status}}">ปัจจุบัน: Moderator</option>
                                            <option value="2">แก้ไขเป็น: Admin</option>
                                            <option value="0">แก้ไขเป็น: User</option>
                                        @else
                                            <option value="{{$users->status}}">ปัจจุบัน:Admin</option>
                                            <option value="1">แก้ไขเป็น: Moderator</option>
                                            <option value="0">แก้ไขเป็น: User</option>
                                        @endif
                                    </select>
                                </div>
                                @else
                                    <nav class="col-sm-2">สถานะ</nav>
                                    <input type="text" class="form-control col-sm-6" name="id" id="id"
                                    @if($users->id == "1")
                                        value="Admin"
                                    @elseif( $users->status == 2)
                                        value="Admin"
                                    @elseif( $users->status == 1)
                                        value="Moderator"
                                    @else
                                        value="User"
                                    @endif readonly>
                                @endif

                                @if(Auth::user()->status == 2 || Auth::user()->id == 1)
                                    <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                                    <button type="submit" name="submit" class="btn btn-success col-sm-2">อัพเดท</button>
                                @endif
                                    {{-- <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                                    <button type="submit" name="submit" class="btn btn-success col-sm-2">อัพเดท</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card my-4">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลของผู้ใช้ </strong></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

                    <center><br><h1> ข้อมูลผู้ใช้ ID นี้ ยังไม่ทำรายการเพื่มข้อมูลส่วนตัว</h1></center>
                    <a class="btn btn-lg btn-primary my-3" href="/UserDetails" >ย้อนกลับ</a><br>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
