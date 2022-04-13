@extends('penyelenggara.layout.master-admin')
@section('title', 'Data Lomba')
@section('menuLomba', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Apakah anda yakin ingin <span class="font-weight-bold text-danger">Menghapus Data?</span></h3>
                <div class="form-group text-center">
                    <a href="/penyelenggara/dashboard/data-lomba/delete/proses/{{$id}}"><button type="submit" class="btn btn-md btn-primary">Submit</button></a>
                    <a href="/penyelenggara/dashboard/data-lomba/{{ Auth::user()->id }}"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection