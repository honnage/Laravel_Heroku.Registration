@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <p><strong>Name : </strong>{!! Auth::user()->name !!}</p> --}}
                    <p><strong>Email : </strong>{!! Auth::user()->email !!}</p>
                    <p><strong>ID Status : </strong>{!! Auth::user()->status !!}</p>

                    @if( Auth::user()->id == 1)
                        <p><strong>สถานะ : </strong>Admin</p>
                    @elseif( Auth::user()->StatusID == 2 )
                        <p><strong>สถานะ : </strong>Admin</p>
                    @elseif( Auth::user()->StatusID == 1 )
                        <p><strong>สถานะ : </strong>Moderator</p>
                    @else
                        <p><strong>สถานะ : </strong>User</p>
                    @endif

                    @if(Auth::user()->checkIsAdmin() || Auth::user()->id == "1")
                        <a href="/subjects/create" class="btn btn-primary col-sm-2">Management</a>
                    @endif


                    @if( sizeof($details) == 1  )
                        <a href="/details/edit/{{Auth::user()->id}}" class="btn btn-warning col-sm-2">แก้ไขข้อมูลส่วนตัว</a>
                    @else
                        <a href="/details/create" class="btn btn-primary col-sm-2">เพื่มข้อมูลส่วนตัว</a>
                    @endif

                    @if( sizeof($details) == 1  )
                        <a href="/register/create" class="btn btn-success col-sm-2">ลงทะเบียนวิชา</a>
                    @endif

                    {{-- @if( sizeof($orders) != 0  ) --}}
                    @if(isset($cartItems) )
                        {{-- มีข้อมูล --}}
                        {{-- <a href="/order/show/" class="btn btn-outline-light col-sm-2 col-xs-6" style="background-color: #F39C12">รายการลงทะเบียน</a> --}}
                    @elseif(sizeof($orders) != 0 )
                        {{-- ไม่มีช้อมูล --}}
                        <a href="/order/show/{{Auth::user()->id}}" class="btn btn-outline-light col-sm-2 col-xs-6" style="background-color: #F39C12">รายการลงทะเบียน</a>

                    @endif

            </div>
        </div>
    </div>
</div>
@endsection
