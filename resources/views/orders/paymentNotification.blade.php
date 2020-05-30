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
                @if($data->status == 0)
                <form action="/order/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">รหัสรายการ</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$data->id}}" readonly>

                            <nav class="col-sm-2">วันที่ลงทะเบียน</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$data->created_at}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ยอดเงิน</nav>
                            <input type="text" class="form-control col-sm-4" name="price" id="price"  value="{{$data->price}}" readonly>

                            <nav class="col-sm-2">สถานะ</nav>
                            <input type="text" class="form-control col-sm-4" name="status" id="status"
                                @if($data->status == 0)
                                    value="ยังไม่ได้ชำระเงิน"
                                @elseif($data->status == 1)
                                    value="รอตรวจสอบ"
                                @elseif($data->status == 3)
                                    value="ชำระเงินแล้ว"
                                @else
                                    value="แก้ไขใหม่"
                                @endif
                            readonly>
                        </div>
                        @if($data->status == 0)
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav for="image" class="col-sm-2">อัพโหลดรูป</nav>
                            <input type="file" class="form-control col-sm-10"  name="image" id="image" >
                            {{-- <nav>
                                <img src="{{asset('storage')}}/product_image/{{$data->image}}" alt="" width="700px" height="900px">
                            </nav> --}}
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2"></nav>
                            <nav class="col-sm-10" style="color: red">* รูปที่ใช้ต้องเป็น นามสกุล JPG, JPEG, PNG ขนาดไม่ 5000ไบต์</nav>
                        </div>
                        @endif

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                            <a class="btn btn-primary check_out col-sm-1" href="/order/show/{{$data->id}}">ย้อนกลับ</a>
                            <a class="col-sm-7" type="reset"></a>
                            @if($data->status == 1 || $data->status == 3)
                                <a class="btn btn-primary check_out col-sm-2" href="/order/showImage/{{$data->id}}">แสดงรป</a>
                            @elseif($data->status == 2)
                                <a class="btn btn-primary check_out col-sm-2" href="/order/showImage/{{$data->id}}">อัพโหลดรูปใหม่</a>
                            @endif
                            <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                            <button type="submit" name="submit" class="btn btn-success col-sm-1">ยืนยัน</button>
                        </div>
                    </div>
                </form>
                @else
                <form action="/order/updateImage/{{$data->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">รหัสรายการ</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$data->id}}" readonly>

                            <nav class="col-sm-2">วันที่ลงทะเบียน</nav>
                            <input type="text" class="form-control col-sm-4" value="{{$data->created_at}}" readonly>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">ยอดเงิน</nav>
                            <input type="text" class="form-control col-sm-4" name="price" id="price"  value="{{$data->price}}" readonly>

                            <nav class="col-sm-2">สถานะ</nav>
                            <input type="text" class="form-control col-sm-4" name="status" id="status"
                                @if($data->status == 0)
                                    value="ยังไม่ได้ชำระเงิน"
                                @elseif($data->status == 1)
                                    value="รอตรวจสอบ"
                                @elseif($data->status == 3)
                                    value="ชำระเงินแล้ว"
                                @else
                                    value="แก้ไขใหม่"
                                @endif
                            readonly>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav for="image" class="col-sm-2">อัพโหลดรูปใหม่</nav>
                            <input type="file" class="form-control col-sm-10"  name="image" id="image" >
                            {{-- <nav>
                                <img src="{{asset('storage')}}/product_image/{{$data->image}}" alt="" width="700px" height="900px">
                            </nav> --}}
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2"></nav>
                            <nav class="col-sm-10" style="color: red">* รูปที่ใช้ต้องเป็น นามสกุล JPG, JPEG, PNG ขนาดไม่ 5000ไบต์</nav>
                        </div>

                        {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                            <nav class="col-sm-2">รูปที่อัพโหลดก่อนหน้านี้</nav>
                            <img src="{{asset('storage')}}/product_image/{{$data->image}}" alt="" width="800px" height="900px">
                        </div> --}}

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                            <a class="btn btn-primary check_out col-sm-1" href="/order/show/{{$data->id}}">ย้อนกลับ</a>
                            <a class="col-sm-7" type="reset"></a>
                            <a class="btn btn-primary check_out col-sm-2" href="/order/showImage/{{$data->id}}">แสดงรป</a>

                            <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                            <button type="submit" name="submit" class="btn btn-success col-sm-1">อัพเดท</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
