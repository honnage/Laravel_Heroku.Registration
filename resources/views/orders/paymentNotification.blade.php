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
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลทำรายการ </strong></div>
                <form action=" " method="post" >
                    {{csrf_field()}}
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เลขบัตรประชาชน</nav>{{$data->id}}
                            {{-- <input type="text" class="form-control col-sm-4" name="code_id" id="code_id" value="{{$orders->id}}" readonly> --}}

                            <nav class="col-sm-2">Username</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin"  value="{{$users->username}}" readonly> --}}
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">Firstname</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="Firstname_TH" id="Firstname_TH" placeholder="เช่น: Test"  value="{{$details->Firstname_TH}}" readonly> --}}

                            <nav class="col-sm-2">Lastname</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="Lastname_TH" id="Lastname_TH" placeholder="เช่น: Admin"  value="{{$details->Lastname_TH}}" readonly> --}}
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ชื่อ</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="Firstname_EN" id="Firstname_EN" placeholder="เช่น: ทดสอบ"  value="{{$details->Firstname_EN}}" readonly> --}}

                            <nav class="col-sm-2">นามสกุล</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="Lastname_EN" id="Lastname_EN" placeholder="เช่น: แอดมิน"  value="{{$details->Lastname_EN}}" readonly> --}}
                        </div>


                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000" value="{{$details->phone}}" readonly> --}}

                            <nav class="col-sm-2">Email</nav>
                            {{-- <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เช่น: 0902480000" value="{{$users->email}}" readonly> --}}

                        </div>


                    </div>



                </form>
            </div>

        </div>
    </div>
</div>
@endsection
