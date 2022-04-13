@extends('layouts.app')
@section('title', 'Info Perlombaan')
@section('menuLomba', 'active')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row p-4">
            @forelse ($result as $val)
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card">
                    <img src="{{ asset('img/poster/'.  $val->gambar ) }}" class="card-img-top" alt="...">

                    <div class="card-body">
                        <div class="card-title">
                            <h4>{{ $val->judul_lomba }}</h4>
                        </div>
                        <p class="card-text">{{ $val->deskripsi }}...<a href="">Baca Detail</a></p>

                        <p class="card-text">Biaya Registrasi: Rp.{{ $val->harga }},-</p>
                        <p class="card-text">Kategori: {{ $val->kategori }}</p>
                        <p class="card-text"><small class="text-muted">Batas Akhir Pendaftaran: {{ $val->deadline}}</small></p>
                    </div>


                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted">Diupload Pada: {{ $val->upload }}</small></p>
                        <a href="/detail-lomba/{{$val->id_lomba}}" class="btn btn-primary">Lihat Detail </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-dark d-inline-block">Tidak ada data...</div>
            @endforelse
        </div>
    </div>
</div>
@endsection