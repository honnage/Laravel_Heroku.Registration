@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <a href="/subjects/create" class="btn btn-primary">Management</a>
                    @endif


                    @if( sizeof($details) == 1  )
                        <a href="/details/edit/{{Auth::user()->id}}" class="btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
                    @else
                        <a href="/details/create" class="btn btn-primary">เพื่มข้อมูลส่วนตัว</a>
                    @endif

                    @if( sizeof($details) == 1  )
                        <a href="/register/create" class="btn btn-success">ลงทะเบียนวิชา</a>
                    @endif

                    {{-- @if( sizeof($orders) != 0  ) --}}
                    @if($orders->user_id == Auth::user()->id )
                        <a href="/order/show/{{Auth::user()->id}}" class="btn btn-outline-light" style="background-color: #F39C12">รายการลงทะเบียน</a>
                    @endif

            </div>
        </div>
    </div>
</div>
@endsection
