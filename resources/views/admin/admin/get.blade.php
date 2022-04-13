@extends('admin.layout.master-admin')
@section('title', 'Data Admin')
@section('menuAdmin', 'active')

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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->user_name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->tempat_lahir }}</td>
                            <td>{{ $data->tgl_lahir }}</td>
                            <td>{{ $data->telp }}</td>
                            <td>
                                <a href="/admin/dashboard/admin/jadikan-user/{{$data->id}}" class=" btn btn-sm btn-success">Hapus Admin</a>
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