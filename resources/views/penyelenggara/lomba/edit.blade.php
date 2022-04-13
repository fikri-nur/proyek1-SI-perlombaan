@extends('penyelenggara.layout.master-admin')
@section('title', 'Data Lomba')
@section('menuLomba', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                @foreach($result as $data)
                <form action="/penyelenggara/dashboard/data-lomba/update/proses/{{$data->id_lomba}}" method="POST">
                    @csrf
                    
                    <div class="row mb-3">
                        <label for="judul_lomba" class="col-md-4 col-form-label text-md-right">{{ __('Judul Lomba') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="judul_lomba" type="text" value="{{ $data->judul_lomba }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="kategori" type="text" value="{{ $data->kategori }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="deskripsi" type="text" value="{{ $data->deskripsi }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tgl_penutupan" class="col-md-4 col-form-label text-md-right">{{ __('Batas Pendaftaran') }}</label>

                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control datepicker" name='tgl_penutupan' value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('Upload Poster') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" type="file" id="formFile" name="gambar" value="{{ $data->gambar }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis_lomba" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Lomba') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="jenis_lomba" type="text" value="{{ $data->jenis_lomba }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Biaya Pendaftaran') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="harga" type="text" value="{{ $data->harga }}" required>
                        </div>
                    </div>



                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                    </div>
                </form>
                <a href="/penyelenggara/dashboard/data-lomba/{{ Auth::user()->id }}"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection