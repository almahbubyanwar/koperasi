<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::get();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaAnggota' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
            'noIdentitas' => 'required',
            'pwd' => 'required'
        ]);
        Anggota::create([
            'namaAnggota' => $request->namaAnggota,
            'tempatLahir' => $request->tempatLahir,
            'tanggalLahir' => $request->tanggalLahir,
            'alamat' => $request->alamat,
            'noTelepon' => '62' . $request->noTelepon,
            'noIdentitas' => $request->noIdentitas,
            'pwd' => $request->pwd
        ]);
        return redirect()->route('anggota.index')->with('status', 'Data berhasil diinput.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function update(Request $request)
    {
        $request->validate([
            'noAnggota' => 'required',
            'namaAnggota' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
            'noIdentitas' => 'required',
            'pwd' => 'required'
        ]);
        Anggota::where('noAnggota', $request['noAnggota'])->update($request->except(['_token', '_method']));
        return redirect()->route('anggota.index')->with('status', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::where('noAnggota', $id)->delete();
        if ($anggota > 0) {
            return redirect()->route('anggota.index')->with('status', 'Data berhasil dihapus.');
        }
        else {
            return redirect()->route('anggota.index')->with('status', 'Data gagal dihapus.');
        }
    }

    /* API function to get user data based on ID. */
    public function getData($id)
    {
        $anggota = Anggota::where('noAnggota', $id)->get();
        return response($anggota, 200);
    }
}
