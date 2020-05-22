<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectModel;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subject = SubjectModel::orderBy('code', 'asc')->paginate(6);
        $subject = SubjectModel::get();

        return view('subjects.create',compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = SubjectModel::get();

        return view('subjects.create',compact('subject'));
    // return view('subjects.create')->with('subject',SubjectModel::orderBy('code', 'asc')->paginate(6));
        // return view('subjects.create')->with('subject',SubjectModel::all());
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
            'code' => 'required|unique:subjects',
            'nameTH' => 'required|unique:subjects',
            'nameEN' => 'required|unique:subjects',
            'price' => 'required',
        ]);

        $subject = new SubjectModel();
        $subject->code = $request->code;
        $subject->nameTH = $request->nameTH;
        $subject->nameEN = $request->nameEN;
        $subject->price = $request->price;

        $subject->save();
        // dd($request);
        return redirect('/subjects');
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
        $data = SubjectModel::get();
        $subject = SubjectModel::find($id);
        return view('subjects.edit', compact('subject','data'));
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
            'code'=>'required',
            'nameTH'=>'required',
            'nameEN'=>'required',
            'price'=>'required',
        ]);

        // $subject = SubjectModel::find($id);
        // $subject->code = $request->code;
        // $subject->nameTH = $request->nameTH;
        // $subject->nameEN = $request->nameEN;
        // $subject->price = $request->price;
        // $subject->save();
        SubjectModel::find($id)->update($request->all()); //บันทึกแบบทั้งหมด
        return redirect('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubjectModel::find($id)->delete();
        return redirect('/subjects');
    }
}
