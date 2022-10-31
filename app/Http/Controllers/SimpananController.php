<?php

namespace App\Http\Controllers;

use App\Models\JenisSimpanan;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index() {
        $jenis = JenisSimpanan::select('idJenis', 'namaJenis')->get();
        $simpanan = Simpanan::leftJoin('jenis_simpanan', 'simpanan.idJenis', '=', 'jenis_simpanan.idJenis')
        ->select('simpanan.*', 'jenis_simpanan.namaJenis')->get();
        return view('simpanan.index', compact('simpanan', 'jenis'));
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal' => 'required',
            'noAnggota' => 'required',
            'idJenis' => 'required',
            'jumlah' => 'required'
        ]);

        $store = 0;

        if (Simpanan::where([['idJenis', '=', $request->idJenis], ['noAnggota', '=', $request->noAnggota]])
        ->count() == 0) {
            $store = Simpanan::create([
                'tanggal' => $request->tanggal,
                'noAnggota' => $request->noAnggota,
                'idJenis' => $request->idJenis,
                'jumlah' => $request->jumlah,
                'userId' => 1
            ]);
        }
        else {
            $store = Simpanan::where([['idJenis', '=', $request->idJenis], ['noAnggota', '=', $request->noAnggota]])
            ->increment('jumlah', $request->jumlah);
        }

        if ($store) {
            return redirect()->route('simpanan.search', $request->noAnggota)->with('status', 'Data berhasil diinput');
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
        $simpanan = Simpanan::where('noAnggota', $userId)
        ->leftJoin('jenis_simpanan', 'simpanan.idJenis', '=', 'jenis_simpanan.idJenis')
        ->select('simpanan.*', 'jenis_simpanan.namaJenis')
        ->get();
        return view('simpanan.index', compact('jenis', 'simpanan', 'userId'));
    }

    public function getJenis($noAnggota) {
        $jenis = Simpanan::where('noAnggota', $noAnggota)
        ->leftJoin('jenis_simpanan', 'simpanan.idJenis', '=', 'jenis_simpanan.idJenis')
        ->select('simpanan.idJenis', 'jenis_simpanan.namaJenis')
        ->get();

        if ($jenis) {
            return response($jenis, 200);
        }
        return response(0, 404);
    }
}
