<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\JenisSimpanan;
use App\Models\Pengambilan;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class PengambilanController extends Controller
{
    public function index() {
        return view('pengambilan.index');
    }

    public function search($idAnggota) {
        $jenis = Simpanan::where('noAnggota', $idAnggota)
        ->leftJoin('jenis_simpanan', 'simpanan.idJenis', '=', 'jenis_simpanan.idJenis')
        ->select('simpanan.idJenis', 'jenis_simpanan.namaJenis')
        ->get();

        $search = 1;
        $anggota = Anggota::where('noAnggota', $idAnggota)->first();
        if ($anggota) {
            $pengambilan = Pengambilan::where('noAnggota', $idAnggota)->get();
            $simpanan = Simpanan::where('noAnggota', $idAnggota)
            ->leftJoin('jenis_simpanan', 'simpanan.idJenis', '=', 'jenis_simpanan.idJenis')
            ->select('jenis_simpanan.namaJenis', 'simpanan.jumlah')->get();
            return view('pengambilan.index', compact('search', 'anggota', 'simpanan', 'jenis', 'pengambilan'));
        }
        else {
            $nop = true;
            return view('pengambilan.index', compact('jenis', 'search', 'nop'));
        }
    }

    public function store(Request $request) {
        $request->validate([
            'noAnggota' => 'required',
            'idJenis' => 'required',
            'jumlah' => 'required'
        ]);
        
        // $dec = Simpanan::where('noAnggota', $request->noAnggota)
        // ->where('idJenis', $request->idJenis)
        // ->decrement('jumlah', $request->jumlah);


        $create = Pengambilan::create([
            'tanggalPengambilan' => $request->tanggalPengambilan ? $request->tanggalPengambilan : date("Y-m-d"),
            'noAnggota' => $request->noAnggota,
            'jumlah' => $request->jumlah,
            'userId' => 1
        ]);
        
        if ($create) {
            return redirect()->route('pengambilan.search', $request->noAnggota)->with('status', 
            array('status' => 'Berhasil', 'message' => 'Data berhasil dimassukan.'));
        }
        return redirect()->route('pengambilan.index')->with('status', 
        array('status' => 'Gagal', 'message' => 'Kegagalan dalam menambahkan pengambilan. Silahkan hubungi admin.'));
    }
}
