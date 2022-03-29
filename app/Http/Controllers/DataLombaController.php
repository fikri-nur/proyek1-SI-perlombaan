<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataLombaController extends Controller
{
    public function getDataLomba()
    {

        $result = DB::table('data_lomba')
            ->select(
                'data_lomba.*',
                DB::raw('DATE_FORMAT(data_lomba.tanggal_pembuatan, "%d-%b-%Y") as upload'),
                DB::raw('DATE_FORMAT(data_lomba.tanggal_penutupan, "%d-%b-%Y") as deadline'),
                DB::raw('SUBSTRING(data_lomba.deskripsi, 1, 100) as deskripsi'))
            
            ->get()
            ->all();
        // dump($result);
        return view('home', compact('result'));
    }
}
