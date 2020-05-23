<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectModel;

class PublicController extends Controller
{
    public function Public(){
        $subject = SubjectModel::get();
        return view('subjects.public',compact('subject'));
    }





}

