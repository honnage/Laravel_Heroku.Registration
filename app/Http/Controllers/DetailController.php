<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DetailModel;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_id' => 'required|unique:details',
            'Firstname_TH' => 'required',
            'Lastname_TH' => 'required',
            'Firstname_EN' => 'required',
            'Lastname_EN' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'address' => 'required',
        ]);

        $details = new DetailModel();
        $details->user_id = Auth::user()->id;
        $details->code_id = $request->code_id;
        $details->Firstname_TH = $request->Firstname_TH;
        $details->Lastname_TH = $request->Lastname_TH;
        $details->Firstname_EN = $request->Firstname_EN;
        $details->Lastname_EN = $request->Lastname_EN;
        $details->gender = $request->gender;
        $details->birthdate = $request->birthdate;
        $details->phone = $request->phone;
        $details->status = $request->status;
        $details->address = $request->address;
        $details->save();

        DB::table('users')
        ->where('users.id','=',$details->user_id )
        ->update([
        'detail' => 1,
        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = DetailModel::find($id);
        return view('details.edit',compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code_id' => 'required',
            'Firstname_TH' => 'required',
            'Lastname_TH' => 'required',
            'Firstname_EN' => 'required',
            'Lastname_EN' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'address' => 'required',
        ]);

        // $details = new DetailModel();
        // $details->user_id = Auth::user()->id;
        // $details->code_id = $request->code_id;
        // $details->Firstname_TH = $request->Firstname_TH;
        // $details->Lastname_TH = $request->Lastname_TH;
        // $details->Firstname_EN = $request->Firstname_EN;
        // $details->Lastname_EN = $request->Lastname_EN;
        // $details->gender = $request->gender;
        // $details->birthdate = $request->birthdate;
        // $details->phone = $request->phone;
        // $details->status = $request->status;
        // $details->address = $request->address;
        // $details->save();

        DetailModel::find($id)->update($request->all()); //บันทึกแบบทั้งหมด

        DB::table('users')
        ->where('users.id','=',$id )
        ->update([
        'detail' => 1,
        ]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
