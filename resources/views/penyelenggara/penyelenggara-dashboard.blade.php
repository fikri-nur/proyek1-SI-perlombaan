@extends('penyelenggara.layout.master-admin')
@section('title', 'Dashboard Penyelenggara')
@section('dashboardPenyelenggara', 'active')

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
                <h1 class="text-center"><span class="font-weight-bold text-primary">Dashboard Penyelenggara</span></h2>
                    <div class="card-body">
                        <h2 class="text-center">Selamat datang <span class="font-weight-bold text-primary">{{ Auth::user()->nama_lengkap }}</span></h2>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection