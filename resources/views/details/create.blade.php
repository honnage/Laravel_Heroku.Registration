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
                <div class="card-header"><strong>เพื่มวิชา </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/details/create" method="post" >
                        {{csrf_field()}}
                        <div class="form-inline">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">เลขบัตรประชาชน</nav>
                                <input type="text" class="form-control col-sm-10" name="code_id" id="code_id" placeholder="เช่น: 110001230088001">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">Firstname</nav>
                                <input type="text" class="form-control col-sm-4" name="Firstname_TH" id="Firstname_TH" placeholder="เช่น: Test">

                                <nav class="col-sm-2">Lastname</nav>
                                <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ชื่อ</nav>
                                <input type="text" class="form-control col-sm-4" name="Firstname_EN" id="Firstname_EN" placeholder="เช่น: ทดสอบ">

                                <nav class="col-sm-2">นามสกุล</nav>
                                <input type="text" class="form-control col-sm-4" name="Lastname_EN" id="Lastname_EN" placeholder="เช่น: แอดมิน">
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">วันเดือนปีเกิด</nav>
                                <input type="date" class="form-control col-sm-4" name="birthdate" id="birthdate" >

                                <nav class="col-sm-2">เพศ</nav>
                                {{-- <input type="text" class="form-control col-sm-4" name="birthdate" id="birthdate" placeholder="เช่น: Test"> --}}
                                <div class = "col-sm-4">
                                    <select class="form-control " name="gender">
                                        <option value="">โปรดเลือกสถานะของท่าน</option>
                                        <option value="ชาย">เพศชาย</option>
                                        <option value="หญิง">เพศหญิง</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                                <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000">

                                <nav class="col-sm-2">สถานะ</nav>
                                {{-- <input type="text" class="form-control col-sm-4" name="status" id="status" placeholder="เช่น: Test"> --}}
                                <div class = "col-sm-4">
                                    <select class="form-control " name="status">
                                        <option value="">โปรดเลือกสถานะของท่าน</option>
                                        <option value="0">กำลังศึกษาหรือเทียบเท่ามัธยมศึกษาปีที่ 6</option>
                                        <option value="1">จบการศึกษามัธยมศึกษาปที่ 6</option>
                                        {{-- <option value="บุคคลภายนอก">บุคคลภายนอก</option> --}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <nav class="col-sm-2">ที่อยู่</nav>
                                <input type="text" class="form-control col-sm-10" name="address" id="address" placeholder="เช่น: Test">
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
