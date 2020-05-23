<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UserModel;
use App\DetailModel;

class UserDetailController extends Controller
{
    public function index(){
        $users = UserModel::orderBy('detail', 'asc');
        return view('users.index',compact('users'));

        // $users =  DB::table('users')
        // ->leftJoin('details', 'details.user_id', '=', 'users.id')
        // ->select('*','users.id as userID','users.status as UserStatus')
        // ->get();
        // return view('users.index',compact('users'));
    }

    public function editStatus($id){
        $users = UserModel::find($id);
        $details = DetailModel::find($id);

        // $details = DB::table('details')
        // ->where('details.user_id' ,'=',$id)
        // ->get();
        if($users->detail > 0 ){
            return view('users.editStatus',compact('details','users'));
        }else{
            return view('users.editStatusDetailNull',compact('users'));        }

    }

    public function update(Request $request, $id){
        $request->validate([
            'status'=>'required',
        ]);

        $users = UserModel::find($id);
        $users->status = $request->status;
        $users->save();
        // SubjectModel::find($id)->update($request->all()); //บันทึกแบบทั้งหมด
        return redirect('/UserDetails');
    }


}
