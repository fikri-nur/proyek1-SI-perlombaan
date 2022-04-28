<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminDashboard()
    {
        return view('admin.admin-dashboard');
    }
    public function getAdmin()
    {
        $count = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('level', '1')
            ->get()->count();

        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('level', '1')
            ->get()
            ->all();
        // dump($result, $count);
        return view('admin.admin.get', compact('result', 'count'));
    }

    public function editAdmin($id)
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.id', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.admin.edit', compact('result', 'id'));
    }

    public function prosesAdmin($id)
    {
        $result = DB::table('users')
            ->where('users.id', $id)
            ->update(
                [
                    'level'          => '3',
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/admin')->with('success', 'Berhasil Menjadikan User');
    }

    public function getPenyelenggara()
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('level', '2')
            ->get()
            ->all();
        // dump($result);
        return view('admin.penyelenggara.get', compact('result'));
    }

    public function editPenyelenggara($id)
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.id', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.penyelenggara.edit', compact('result', 'id'));
    }

    public function prosesPenyelenggara($id)
    {
        $result = DB::table('users')
            ->where('users.id', $id)
            ->update(
                [
                    'level'          => '3',
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/penyelenggara')->with('success', 'Berhasil Menjadikan User');
    }

    public function getUser()
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('level', '3')
            ->get()
            ->all();
        // dump($result);
        return view('admin.user.get', compact('result'));
    }

    public function editUser($id)
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.id', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.user.edit', compact('result', 'id'));
    }

    public function prosesUser($id)
    {
        $result = DB::table('users')
            ->where('users.id', $id)
            ->update(
                [
                    'level'          => '1',
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/user')->with('success', 'Berhasil Menjadikan Admin');
    }

    public function addPenyelenggara($id)
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.id', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.penyelenggara.addPenyelenggara', compact('result', 'id'));
    }

    public function prosesAdd($id)
    {
        $result = DB::table('users')
            ->where('users.id', $id)
            ->update(
                [
                    'level'          => '2',
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/user')->with('success', 'Berhasil Menjadikan Penyelenggara');
    }

    public function getLombaAdmin()
    {

        $result = DB::table('data_lomba')
            ->join('users', 'users.id', '=', 'data_lomba.id_user')
            ->select(
                'data_lomba.*',
                'users.user_name',
                DB::raw('DATE_FORMAT(data_lomba.tanggal_pembuatan, "%d-%b-%Y") as upload'),
                DB::raw('DATE_FORMAT(data_lomba.tanggal_penutupan, "%d-%b-%Y") as deadline'),
                DB::raw('SUBSTRING(data_lomba.deskripsi, 1, 100) as deskripsi')
            )
            ->orderBy('id_lomba')
            ->get()
            ->all();
        // dump($result);
        return view('admin.lomba.get', compact('result'));
    }

    public function deleteLomba($id)
    {
        return view('admin.lomba.delete', compact('id'));
    }

    public function deleteLombaProses($id)
    {
        $result = DB::table('data_lomba')
            ->where('id_lomba', '=', $id)
            ->delete();
        return redirect('/admin/dashboard/data-lomba')->with('success', 'Hapus Data Berhasil');
    }
}
