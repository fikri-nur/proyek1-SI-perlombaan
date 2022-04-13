@extends('penyelenggara.layout.master-admin')
@section('title', 'Data Lomba')
@section('menuLomba', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                <form action="/penyelenggara/dashboard/data-lomba/{{ Auth::user()->id }}/tambah-data/proses" method="POST">
                    @csrf

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="tgl_pembuatan" value="{{ date('Y-m-d H:i:s') }}">

                    <div class="row mb-3">
                        <label for="judul_lomba" class="col-md-4 col-form-label text-md-right">{{ __('Judul Lomba') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="judul_lomba" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="kategori" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="deskripsi" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tgl_penutupan" class="col-md-4 col-form-label text-md-right">{{ __('Batas Pendaftaran') }}</label>

                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control datepicker" name='tgl_penutupan' placeholder="">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('Upload Poster') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" type="file" id="formFile" name="gambar" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis_lomba" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Lomba') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="jenis_lomba" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Biaya Pendaftaran') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="harga" type="text" value="" required>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
                <a href="/penyelenggara/dashboard/data-lomba/{{ Auth::user()->id }}"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
            </div>
        </div>
    </div>
</div>
@endsection