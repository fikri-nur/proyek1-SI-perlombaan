@extends('layouts.app')
@section('title','About Us')
@section('menuAbout', 'active')

@section('content')
<div class="container text-center mt-3 p-4 bg-white">
    <img src="img/assets/logo.jpg">
</div>
<div class="container text-center mt-3 p-4 bg-white">
    <p class="p p--from-left">Sistem informasi perlombaan berbasis web ini merupakan media informasi perlombaan
        yang mempertemukan penyelenggara lomba dan peserta lomba. Dengan dibuatnya sistem informasi ini diharapkan
        dapat memfasilitasi para penyelenggara lomba seperti sekolah atau lembaga swasta untuk menggelar kegiatan perlombaan.
        Dengan adanya sistem informasi ini dapat mempermudah peserta lomba yang ingin mengikuti lomba. Sistem informasi ini
        juga memberikan informasi berbagai event lomba yang sedang diadakan oleh lembaga tertentu.
</div>
<div class="container text-left mt-3 p-4">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12">
            <div class="text-center">
                <h2>Review</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('abou.create') }}"> Tambah Review</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <table class="table table-striped table-bordered data">
                <tr>
                    <th width="280px" class="text-center">No</th>
                    <th width="280px" class="text-center">Nama</th>
                    <th width="280px" class="text-center">Alamat</th>
                    <th width="280px" class="text-center">Riview</th>
                    <th width="280px" class="text-center">Action</th>
                </tr>
                @foreach ($abou as $about)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>

                    <td>{{ $about->NamaPeserta }}</td>
                    <td>{{ $about->Alamat }}</td>
                    <td>{!! Str::limit( strip_tags( $about->Riview ), 50 ) !!}</td>
                    @guest
                    @if (Route::has('login') || Route::has('register'))
                    <td class="text-center">
                        <p>Kosong</p>
                    </td>
                    @endif
                    @else
                    @if (auth()->user()->level == 1)
                    <td class="text-center">
                        <form action="{{ route('abou.destroy',$about->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                    @endif
                    @endguest
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    {!! $abou->links() !!}

    @endsection