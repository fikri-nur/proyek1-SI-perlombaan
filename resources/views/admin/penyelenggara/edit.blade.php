@extends('admin.layout.master-admin')
@section('title', 'Data Penyelenggara')
@section('menuPenyelenggara', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Apakah anda yakin ingin <span class="font-weight-bold text-success">Jadikan User?</span></h3>
                <div class="form-group text-center">
                    <a href="/admin/dashboard/penyelenggara/jadikan-user/proses/{{$id}}"><button type="submit" class="btn btn-md btn-primary">Submit</button></a>
                    <a href="/admin/dashboard/penyelenggara"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection