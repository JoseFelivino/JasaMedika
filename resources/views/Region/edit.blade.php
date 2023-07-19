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

<form action='{{url('region/'.$data->id)}}' method='post'>
    @csrf
    @method('PUT')
    <div class="container my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('region')}}" class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Kelurahan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kelurahan' id="kelurahan" value="{{$data->kelurahan}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Kecamatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kecamatan' id="kecamatan"value="{{$data->kecamatan}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kota' id="kota" value="{{$data->kota}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="region" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
