<?php

namespace App\Http\Controllers;

use App\Models\JenisSimpanan;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index() {
        $jenis = JenisSimpanan::select('idJenis', 'namaJenis')->get();
        $simpanan = Simpanan::join('jenis_simpanan', 'simpanan.idJenis', '=', 'jenis_simpanan.idJenis')
        ->select('simpanan.*', 'jenis_simpanan.namaJenis')->get();
        return view('simpanan.index', compact('jenis', 'simpanan'));
    }

    public function store(Request $request) {
        $jumlah = JenisSimpanan::where('idJenis', $request->idJenis)->select('jumlah')->first()->jumlah;
        $store = Simpanan::create([
            'tanggal' => $request->tanggal,
            'noAnggota' => $request->noAnggota,
            'idJenis' => $request->idJenis,
            'jumlah' => $jumlah,
            'userId' => 1
        ]);
        if ($store) {
            return redirect()->route('simpanan.index')->with('status', 'Data berhasil diinput');
        }
        return redirect()->route('simpanan.index')->with('status', 'Data gagal diinput');
    }

    public function destroy($id) {
        $delete = Simpanan::where('idSimpanan', $id)->delete();
        if ($delete) {
            return redirect()->route('simpanan.index')->with('status', 'Data berhasil dihapus.');
        }
        return redirect()->route('simpanan.index')->with('status', 'Data gagal dihapus.');
    }

    public function search($userId) {
        $jenis = JenisSimpanan::select('idJenis', 'namaJenis')->get();
        $simpanan = Simpanan::where('noAnggota', $userId)->get();
        return view('simpanan.index', compact('jenis', 'simpanan', 'userId'));
    }
}
