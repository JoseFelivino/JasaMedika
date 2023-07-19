<?php

namespace App\Http\Controllers;

use App\Models\region;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use Illuminate\Support\Facades\Gate;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }

        $data = region::orderBy('created_at','desc')->get();
        return view('region.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Session::flash('kelurahan', $request->kelurahan);
        \Illuminate\Support\Facades\Session::flash('kecamatan', $request->kecamatan);
        \Illuminate\Support\Facades\Session::flash('kota', $request->kota);
        $request->validate([
            'kelurahan'=>'required',
            'kecamatan'=>'required',
            'kota'=>'required'
        ]);
       $data = [
           'kelurahan'=>$request->kelurahan,
           'kecamatan'=>$request->kecamatan,
           'kota'=>$request->kota,
       ];
       region::create($data);
        return redirect()->to('region')->with('success', 'Berhasil Menambahkan Data');
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
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
       $data = region::where('id', $id)->first();
       return view('region.edit')->with('data',$data);
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
        \Illuminate\Support\Facades\Session::flash('kelurahan', $request->kelurahan);
        \Illuminate\Support\Facades\Session::flash('kecamatan', $request->kecamatan);
        \Illuminate\Support\Facades\Session::flash('kota', $request->kota);
        $request->validate([
            'kelurahan'=>'required',
            'kecamatan'=>'required',
            'kota'=>'required'
        ]);
        $data = [
            'kelurahan'=>$request->kelurahan,
            'kecamatan'=>$request->kecamatan,
            'kota'=>$request->kota,

        ];
        region::where('id',$id)->update($data);
        return redirect()->to('region')->with('success', 'Berhasil Mengupdate Data');
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
