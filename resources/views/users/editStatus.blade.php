
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
                <div class="card-header"><strong>รายละเอียดผู้ใช้ {{$usersData->code_id}}</strong></div>

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
                                {{-- <input type="text" class="form-control col-sm-10" name="nameTH" id="nameTH" value="{{$usersData->Firstname_TH}}"> --}}
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
        </div>
    </div>
</div>
@endsection
