<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UserModel;

class UserDetailController extends Controller
{
    public function index(){
        $users = UserModel::all();

        $usersData = DB::table('users')
        ->leftJoin('details','details.user_id','=','users.id')
        ->select('*','users.id as userID','users.status as UserStatus')
        // ->groupBy('SendDocuments.id')
        ->orderBy('users.id', 'DESC')
        ->get();

        return view('users.index',compact('users','usersData'));
    }

    public function editStatus($id){
        $usersData = DB::table('users')
        ->fullOuterJoin('details','details.user_id','=','users.id')
        ->select('*','users.id as userID','users.status as UserStatus')
        // ->groupBy('users.id')
        // ->orderBy('users.id', 'DESC')
        ->where('users.id')
        ->get();
        return view('users.editStatus', compact('usersData'));
    }
}
