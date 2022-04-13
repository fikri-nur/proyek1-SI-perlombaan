@extends('admin.layout.master-admin')
@section('title', 'Data Lomba')
@section('menuLomba', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        @if(Session::has('success'))
        <div class="alert alert-success">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
        <hr>
        <div class="card">
            <div class="card-header">
                <table class="table table-striped table-bordered data">
                    <thead class="table-primary">
                        <tr>
                            <th>NO.</th>
                            <th>ID</th>
                            <th>Penyelenggara</th>
                            <th>Judul Lomba</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Tanggal Penutupan</th>
                            <th>Gambar</th>
                            <th>Jenis Lomba</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->id_lomba }}</td>
                            <td>{{ $data->user_name}}</td>
                            <td>{{ $data->judul_lomba}}</td>
                            <td>{{ $data->kategori}}</td>
                            <td>{{ $data->deskripsi}}</td>
                            <td>{{ $data->tanggal_pembuatan}}</td>
                            <td>{{ $data->tanggal_penutupan}}</td>
                            <td><img src="{{ asset('img/poster/'.  $data->gambar ) }}" class="card-img-top" alt="..."></td>
                            <td>{{ $data->jenis_lomba}}</td>
                            <td>{{ $data->harga}}</td>
                            <td>
                                <a href="/admin/dashboard/data-lomba/delete/{{$data->id_lomba}}" class=" btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection