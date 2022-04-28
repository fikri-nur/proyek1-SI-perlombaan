<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AboutControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abou = About::latest()->paginate(5);
        return view('abou.index',compact('abou'))->with('i', (request()
        ->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abou.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(
           [
               'NamaPeserta' => 'required',
               'Alamat' => 'required',
               'Riview' => 'required',

           ]
           );

           About::create($request->all());

           return redirect()->route('abou.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show(peserta $peser)
    {
        return view('peser.show',compact('peser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit(peserta $peser)
    {
        return view('peser.edit', compact('peser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, peserta $peser)
    {
        $request->validate([
            'No' => 'required',
            'NamaPeserta' => 'required',
            'tanggal_lahir' => 'required',
            'Lomba' => 'required',
            'AsalSekolah' => 'required',
        ]);

        $peser->update($request->all());

        return redirect()->route('peser.index')->with('succes','Data Peserta Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $abou)
    {
        $abou->delete();

        return redirect()->route('abou.index')->with('succes','Data Berhasil di Hapus');
    }
}

