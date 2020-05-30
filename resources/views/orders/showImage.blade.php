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
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> รูปหลักฐานการโอนเงิน </strong></div>
                <form action="/order/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        </div>

                    </div>
                    <center>
                        <img src="{{asset('storage')}}/product_image/{{$data->image}}" alt="" width="800px" height="900px">
                    </center>

                    <div>
                        <a class="btn btn-primary check_out col-sm-1" href="/order/paymentNotification/{{$data->id}}">ย้อนกลับ</a>
                        <a class="col-sm-8" type="reset"></a>
                        <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                        <button type="submit" name="submit" class="btn btn-success col-sm-1">ยืนยัน</button>
                    </div>

                </form>

            </div>


        </div>
    </div>
</div>
@endsection
