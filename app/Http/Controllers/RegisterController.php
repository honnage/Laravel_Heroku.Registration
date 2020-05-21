<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectModel;

class RegisterController extends Controller
{
    public function create(){
        $subject = SubjectModel::get();
        return view('registers.create',compact('subject'));
    }

    public function addSubjectToCart(Request $request, $id){
        // dd(SubjectModel::find($id));

    }
}
