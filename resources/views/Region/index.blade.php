@extends('layouts.app')
@section('content')
    <div class="container my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
{{--        <div class="pb-3">--}}
{{--            <form class="d-flex" action="{{url('region')}}" method="get">--}}
{{--                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">--}}
{{--                <button class="btn btn-secondary" type="submit">Cari</button>--}}
{{--            </form>--}}
{{--        </div>--}}
        <div class="pb-3">
            <a href='{{url('region/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Kelurahan</th>
                <th class="col-md-4">Kecamatan</th>
                <th class="col-md-2">Kota</th>
                <th class="col-md-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <?php $i =1?>
            @foreach($data as $items)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->kelurahan}}</td>
                    <td>{{$items->kecamatan}}</td>
                    <td>{{$items->kota}}</td>

                    <td>
                        <a href='{{url('region/'.$items->id.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
{{--                        <a href='' class="btn btn-danger btn-sm">Del</a>--}}
                    </td>
                </tr>
                <?php $i++?>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

