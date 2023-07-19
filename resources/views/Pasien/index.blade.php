@extends('layouts.app')
@section('content')
    <div class="container my-3 p-3 bg-body rounded shadow-sm">
{{--        <div class="pb-3">--}}
{{--            <form class="d-flex" action="{{url('pasien')}}" method="get">--}}
{{--                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">--}}
{{--                <button class="btn btn-secondary" type="submit">Cari</button>--}}
{{--            </form>--}}
{{--        </div>--}}
        <div class="pb-3">
            <a href='{{url('pasien/create')}}' class="btn btn-primary">+ Tambah Pasien</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-md">No</th>
                <th class="col-md">Name</th>
                <th class="col-md">Address</th>
                <th class="col-md">Phone</th>
                <th class="col-md">Rt/Rw</th>
                <th class="col-md">Kelurahan</th>
                <th class="col-md">Date Of Birth</th>
                <th class="col-md">Gender</th>
                <th class="col-md">Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <?php $i =1?>
            @foreach($data as $items)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->Name}}</td>
                    <td>{{$items->Address}}</td>
                    <td>{{$items->Phone}}</td>
                    <td>{{$items->Rtrw}}</td>
                    <td>{{$items->KelurahanId}}</td>
                    <td>{{$items->Dob}}</td>
                    <td>{{$items->Gender}}</td>
                    <td>
                        <a href='{{url('pasien/'.$items->PasienId.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
{{--                                                <a href='' class="btn btn-danger btn-sm">Del</a>--}}
                    </td>
                </tr>
                <?php $i++?>
                @endforeach
                </tbody>
        </table>
    </div>
@endsection

