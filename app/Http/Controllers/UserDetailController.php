<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UserModel;

class UserDetailController extends Controller
{
    public function index(){
        // $users = UserModel::all();
        // return view('users.index',compact('users'));

        $users =  DB::table('users')
        ->leftJoin('details', 'details.user_id', '=', 'users.id')
        ->select('*','users.id as userID','users.status as UserStatus')
        ->get();
        return view('users.index',compact('users'));
        return view('users.index',compact('users'));
    }

    public function editStatus($id){
        $usersData = DB::table('details')
        // ->join('users','users.id','=','details.user_id')
        ->select('*',
        // 'users.id as userID','users.status as UserStatus'
        )
        // ->groupBy('users.id')
        // ->orderBy('users.id', 'DESC')
        ->where('details.user_id')
        ->get();
        $userdetail = UserDetailModel::where('details.user_id')->get();
        return view('users.editStatus', compact('usersData','userdetail'));
    }
}
