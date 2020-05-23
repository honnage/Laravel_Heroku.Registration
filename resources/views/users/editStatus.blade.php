
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
                                            <option value="{{$users->status}}">ID 1 สถานะเริ่มต้น 0 จะเป็น Admin  </option>
                                            <option value="1">แก้ไขเป็น: Moderator</option>
                                            <option value="0">แก้ไขเป็น: User</option>
                                            <option value="2">แก้ไขเป็น: Admin</option>
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
            @if( $details->code_id == null  )
                <div class="card my-4">
                    <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลของผู้ใช้ </strong></div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

                        <center><br><h1> ข้อมูลผู้ใช้ ID นี้ ยังไม่ทำรายการเพื่มข้อมูลส่วนตัว</h1></center>
                        <a class="btn btn-lg btn-primary my-3" href="/UserDetails" >ย้อนกลับ</a><br>

                    </div>
                </div>
            @else
                <div class="card my-4">
                    <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลของผู้ใช้ </strong></div>
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เลขบัตรประชาชน</nav>
                            <input type="text" class="form-control col-sm-10" name="code_id" id="code_id" value="{{$details->code_id}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">Firstname</nav>
                            <input type="text" class="form-control col-sm-4" name="Firstname_TH" id="Firstname_TH" placeholder="เช่น: Test"  value="{{$details->Firstname_TH}}" readonly>

                            <nav class="col-sm-2">Lastname</nav>
                            <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin"  value="{{$details->Lastname_TH}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ชื่อ</nav>
                            <input type="text" class="form-control col-sm-4" name="Firstname_EN" id="Firstname_EN" placeholder="เช่น: ทดสอบ"  value="{{$details->Firstname_EN}}" readonly>

                            <nav class="col-sm-2">นามสกุล</nav>
                            <input type="text" class="form-control col-sm-4" name="Lastname_EN" id="Lastname_EN" placeholder="เช่น: แอดมิน"  value="{{$details->Lastname_EN}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">วันเดือนปีเกิด</nav>
                            <input type="date" class="form-control col-sm-4" name="birthdate" id="birthdate"  value="{{$details->birthdate}}" readonly>

                            <nav class="col-sm-2">เพศ</nav>
                            {{-- <div class = "col-sm-4">
                                <select class="form-control " name="gender" readonly>
                                    @if( $details->gender == "ชาย")
                                        <option value="{{$details->gender}}">เพศ{{$details->gender}} </option>
                                        <option value="หญิง">แก้ไขสถานะเป็น เพศหญิง</option>
                                    @elseif( $details->gender == "หญิง")
                                        <option value="{{$details->gender}}">เพศ{{$details->gender}} </option>
                                        <option value="ชาย">แก้ไขสถานะเป็น เพศชาย</option>
                                    @endif
                                </select>
                            </div> --}}
                            <input type="text" class="form-control col-sm-4" name="gender" id="gender"  value="{{$details->gender}}" readonly>

                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                            <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000" value="{{$details->phone}}" readonly>

                            <nav class="col-sm-2">สถานะ</nav>
                            {{-- <div class = "col-sm-4">
                                <select class="form-control " name="status" readonly>
                                    @if( $details->status == "0")
                                        <option value="{{$details->status}}">กำลังศึกษาหรือเทียบเท่ามัธยมศึกษาปีที่ 6</option>
                                        <option value="1">จบการศึกษามัธยมศึกษาปีที่ 6</option>
                                    @elseif( $details->status == "1")
                                        <option value="{{$details->status}}">จบการศึกษามัธยมศึกษาปที่ 6</option>
                                        <option value="0">กำลังศึกษาหรือเทียบเท่ามัธยมศึกษาปีที่ 6</option>
                                    @endif
                                </select>
                            </div> --}}
                            <input type="text" class="form-control col-sm-4" name="status" id="status"
                            @if( $details->status == "0")
                                value="กำลังศึกษาหรือเทียบเท่ามัธยมศึกษาปีที่ 6"
                            @else
                                value="จบการศึกษามัธยมศึกษาปีที่ 6"
                            @endif
                            {{-- value="{{$details->status}}"  --}} readonly>

                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ที่อยู่</nav>
                            <input type="text" class="form-control col-sm-10" name="address" id="address" placeholder="เช่น: Test" value="{{$details->address}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <a href="/UserDetails"  class="btn btn-primary col-sm-2">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
