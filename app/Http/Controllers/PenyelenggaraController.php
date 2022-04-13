<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyelenggaraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function penyelenggaraDashboard()
    {
        return view('penyelenggara.penyelenggara-dashboard');
    }

    public function getLombaPenyelenggara($id)
    {   
        $result = DB::table('data_lomba')
            ->select(
                'data_lomba.*',
                DB::raw('DATE_FORMAT(data_lomba.tanggal_pembuatan, "%d-%b-%Y") as upload'),
                DB::raw('DATE_FORMAT(data_lomba.tanggal_penutupan, "%d-%b-%Y") as deadline'),
                DB::raw('SUBSTRING(data_lomba.deskripsi, 1, 100) as deskripsi'))
            ->where('data_lomba.id_user', '=', $id)
            ->orderBy('id_lomba')
            ->get()
            ->all();
        // dump($result);
        return view('penyelenggara.lomba.get', compact('result'));
    }

    public function tambahData()
    {
        return view('penyelenggara.lomba.create');
    }

    public function tambahDataProses(Request $request)
    {
        $result = DB::table('data_lomba')
            ->insert(
                [
                    'id_user'               => $request->id_user,
                    'judul_lomba'           => $request->judul_lomba,
                    'kategori'              => $request->kategori,
                    'deskripsi'             => $request->deskripsi,
                    'tanggal_pembuatan'     => now(),
                    'tanggal_penutupan'     => $request->tgl_penutupan,
                    'gambar'                => $request->gambar,
                    'jenis_lomba'           => $request->jenis_lomba,
                    'harga'                 => $request->harga,
                    'created_at'            => now(),
                    'updated_at'            => now(),
                ]
            );
        return redirect('/penyelenggara/dashboard')->with('success', 'Tambah Data Berhasil');
    }

    public function update($id)
    {
        $result = DB::table('data_lomba')
            ->select(
                'data_lomba.*',
            )
            ->where('id_lomba', $id)
            ->get()
            ->all();
        // dump($result);
        return view('penyelenggara.lomba.edit', compact('result'));
    }

    public function prosesUpdate(Request $request, $id)
    {
        $result = DB::table('data_lomba')
            ->where('id_lomba', $id)
            ->update(
                [
                    'judul_lomba'           => $request->judul_lomba,
                    'kategori'              => $request->kategori,
                    'deskripsi'             => $request->deskripsi,
                    'tanggal_penutupan'     => $request->tgl_penutupan,
                    'gambar'                => $request->gambar,
                    'jenis_lomba'           => $request->jenis_lomba,
                    'harga'                 => $request->harga,
                    'updated_at'            => now(),
                ]
            );
        return redirect('/penyelenggara/dashboard')->with('success', 'Update Data Berhasil');
    }

    public function deleteLombaPenyelenggara($id)
    {
        return view('penyelenggara.lomba.delete', compact('id'));
    }

    public function deleteLombaProsesPenyelenggara($id)
    {
        $result = DB::table('data_lomba')
            ->where('id_lomba', '=', $id)
            ->delete();
        return redirect('/penyelenggara/dashboard')->with('success', 'Hapus Data Berhasil');
    }

}
