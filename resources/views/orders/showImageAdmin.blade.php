@extends('layouts.admin')
@section('body')

<div class="container">
    <div class="data justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#494B4B; color: white"><strong> รูปหลักฐานการโอนเงิน </strong></div>
                <a class="btn btn-primary check_out col-sm-1 my-2" href="/orders/dashboardDetail/{{$data->id}}">ย้อนกลับ</a>
                <form action="/order/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-inline">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        </div>
                    </div>
                    <center>
                        <img src="{{asset('storage')}}/product_image/{{$data->image}}" alt="" width="800px" height="900px">
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
