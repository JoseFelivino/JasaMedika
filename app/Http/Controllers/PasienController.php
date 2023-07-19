<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use App\Models\region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use MongoDB\Driver\Session;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('isAdmin')&&! Gate::allows('isOperator')) {
            abort(403);
        }
        $data = pasien::orderBy('created_at','desc')->get();
        return view('pasien.index')->with('data',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('isAdmin')&&! Gate::allows('isOperator')) {
            abort(403);
        }
        $data = region::all();
        return view('pasien.create')->with('data', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Session::flash('Name', $request->Name);
        \Illuminate\Support\Facades\Session::flash('Address', $request->Address);
        \Illuminate\Support\Facades\Session::flash('Phone', $request->Phone);
        \Illuminate\Support\Facades\Session::flash('Rtrw', $request->Rtrw);
        \Illuminate\Support\Facades\Session::flash('KelurahanId', $request->KelurahanId);
        \Illuminate\Support\Facades\Session::flash('Dob', $request->Dob);
        \Illuminate\Support\Facades\Session::flash('Gender', $request->Gender);
        $request->validate([
            'Name'=>'required',
            'Address'=>'required',
            'Phone'=>'required',
            'Rtrw'=>'required',
            'KelurahanId'=>'required',
            'Dob'=>'required',
            'Gender'=>'required'
        ]);
        $data = [
            'PasienId'=>pasien::generateId(),
            'Name'=>$request->Name,
            'Address'=>$request->Address,
            'Phone'=>$request->Phone,
            'Rtrw'=>$request->Rtrw,
            'KelurahanId'=>$request->KelurahanId,
            'Dob'=>$request->Dob,
            'Gender'=>$request->Gender,
        ];
        pasien::create($data);
        return redirect()->to('pasien')->with('success', 'Berhasil Menambahkan Data');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('isAdmin')&&! Gate::allows('isOperator')) {
            abort(403);
        }
        $dataregion = region::all();
        $data = pasien::where('PasienId', $id)->first();
        return view('pasien.edit')->with('data',$data)->with('dataregion',$dataregion);
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
        \Illuminate\Support\Facades\Session::flash('Name', $request->Name);
        \Illuminate\Support\Facades\Session::flash('Address', $request->Address);
        \Illuminate\Support\Facades\Session::flash('Phone', $request->Phone);
        \Illuminate\Support\Facades\Session::flash('Rtrw', $request->Rtrw);
        \Illuminate\Support\Facades\Session::flash('KelurahanId', $request->KelurahanId);
        \Illuminate\Support\Facades\Session::flash('Dob', $request->Dob);
        \Illuminate\Support\Facades\Session::flash('Gender', $request->Gender);
        $request->validate([
            'Name'=>'required',
            'Address'=>'required',
            'Phone'=>'required',
            'Rtrw'=>'required',
            'KelurahanId'=>'required',
            'Dob'=>'required',
            'Gender'=>'required'
        ]);
        $data = [
            'Name'=>$request->Name,
            'Address'=>$request->Address,
            'Phone'=>$request->Phone,
            'Rtrw'=>$request->Rtrw,
            'KelurahanId'=>$request->KelurahanId,
            'Dob'=>$request->Dob,
            'Gender'=>$request->Gender,
        ];
        pasien::where('PasienId',$id)->update($data);
        return redirect()->to('pasien')->with('success', 'Berhasil Mengupdate Data');
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
