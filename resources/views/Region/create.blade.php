@extends('layouts.app')
@section('content')

@if($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $items)
                    <li>
                     {{$items}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<form action='{{url('region')}}' method='post'>
    @csrf
    <div class="container my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Kelurahan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kelurahan' id="kelurahan" value="{{\Illuminate\Support\Facades\Session::get('kelurahan')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Kecamatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kecamatan' id="kecamatan"value="{{\Illuminate\Support\Facades\Session::get('kecamatan')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kota' id="kota" value="{{\Illuminate\Support\Facades\Session::get('kota')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="region" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
