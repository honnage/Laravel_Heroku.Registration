@extends('layouts.app')

@section('content')
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
                <div class="card-header"><strong>แก้ไขประวัติส่วนตัว ID: {{Auth::user()->id}} </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/details/update/{{$details->user_id}}" method="post" >
                        {{csrf_field()}}
                        {{-- @method('PUT') --}}
                        <div class="form-inline">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">เลขบัตรประชาชน</nav>
                                <input type="text" class="form-control col-sm-10" name="code_id" id="code_id" placeholder="เช่น: 110001230088001" value="{{$details->code_id}}">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">Firstname</nav>
                                <input type="text" class="form-control col-sm-4" name="Firstname_TH" id="Firstname_TH" placeholder="เช่น: Test"  value="{{$details->Firstname_TH}}">

                                <nav class="col-sm-2">Lastname</nav>
                                <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin"  value="{{$details->Lastname_TH}}">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อ</nav>
                                <input type="text" class="form-control col-sm-4" name="Firstname_EN" id="Firstname_EN" placeholder="เช่น: ทดสอบ"  value="{{$details->Firstname_EN}}">

                                <nav class="col-sm-2">นามสกุล</nav>
                                <input type="text" class="form-control col-sm-4" name="Lastname_EN" id="Lastname_EN" placeholder="เช่น: แอดมิน"  value="{{$details->Lastname_EN}}">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">วันเดือนปีเกิด</nav>
                                <input type="date" class="form-control col-sm-4" name="birthdate" id="birthdate"  value="{{$details->birthdate}}" >

                                <nav class="col-sm-2">เพศ</nav>
                                <div class = "col-sm-4">

                                    <select class="form-control " name="gender">
                                        @if( $details->gender == "ชาย")
                                            <option value="{{$details->gender}}">เพศ{{$details->gender}} </option>
                                            <option value="หญิง">แก้ไขสถานะเป็น เพศหญิง</option>
                                        @elseif( $details->gender == "หญิง")
                                            <option value="{{$details->gender}}">เพศ{{$details->gender}} </option>
                                            <option value="ชาย">แก้ไขสถานะเป็น เพศชาย</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                                <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000" value="{{$details->phone}}">

                                <nav class="col-sm-2">สถานะ</nav>
                                <div class = "col-sm-4">
                                    <select class="form-control " name="status">
                                        @if( $details->status == "0")
                                            <option value="{{$details->status}}">กำลังศึกษาหรือเทียบเท่ามัธยมศึกษาปีที่ 6</option>
                                            <option value="1">จบการศึกษามัธยมศึกษาปีที่ 6</option>
                                        @elseif( $details->status == "1")
                                            <option value="{{$details->status}}">จบการศึกษามัธยมศึกษาปที่ 6</option>
                                            <option value="0">กำลังศึกษาหรือเทียบเท่ามัธยมศึกษาปีที่ 6</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ที่อยู่</nav>
                                <input type="text" class="form-control col-sm-10" name="address" id="address" placeholder="เช่น: Test" value="{{$details->address}}">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <a href="/home"  class="btn btn-primary col-sm-2">ย้อนกลับ</a>
                                <nav class="col-sm-7"></nav>
                                <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                                <button type="submit" name="submit" class="btn btn-success col-sm-2">อัพเดท</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
