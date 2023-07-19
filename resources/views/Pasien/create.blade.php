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

    <form action='{{url('pasien')}}' method='post'>
        @csrf
        <div class="container my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Name' id="Name" value="{{\Illuminate\Support\Facades\Session::get('Name')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Address' id="Address"value="{{\Illuminate\Support\Facades\Session::get('Address')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='Phone' id="Phone" value="{{\Illuminate\Support\Facades\Session::get('Phone')}}">
                </div>
            </div><div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Rt/Rw</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Rtrw' id="Rtrw" value="{{\Illuminate\Support\Facades\Session::get('Rtrw')}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Kelurahan</label>
                <div class="col-sm-10">
                    <select name="KelurahanId" id="KelurahanId" class="form-control">
                        <option value="">== Pilih Kelurahan ==</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->kelurahan }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Dob</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='Dob' id="Dob" value="{{\Illuminate\Support\Facades\Session::get('Dob')}}">
                </div>

            </div>
                <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select name="Gender" id="Gender" class="form-control">
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="region" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
@endsection
