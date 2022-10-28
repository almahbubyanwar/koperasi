<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Models\PinjamanDetail;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('pinjaman.index', compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pinjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Checks if member exists.
        $anggota = Anggota::where('noAnggota', $request->noAnggota)->first('namaAnggota');
        if (!$anggota) {
            return redirect()->route('pinjaman.create')->with('status', array('status' => 'Error', 'message' => 'Nomor anggota yang dimasukkan tidak ditemukan.'));
        }

        // Adds request to model.
        $pinjaman = Pinjaman::create([
            'tanggalPinjaman' => $request->tanggalPinjaman,
            'noAnggota' => $request->noAnggota,
            'jumlah' => $request->jumlah,
            'lama' => $request->lama,
            'bunga' => $request->bunga,
            'userId' => 1
        ]);

        // Logic for details.
        $idPinjaman = $pinjaman->id;
        $angsuran = $request->jumlah / $request->lama;
        $bunga = $angsuran * ($request->bunga / 100);
        $jumlah = $angsuran + $bunga;

        for ($i = 1; $i <= $request->lama; $i++) {
            $add = PinjamanDetail::create([
                'idPinjaman' => $idPinjaman,
                'cicilan' => $i,
                'angsuran' => $angsuran,
                'bunga' => $bunga,
                'jumlahPembayaran' => 0
            ]);
            if (!$add) {
                return redirect()->route('pinjaman.create')->with('status', array('status' => 'Error', 'message' => 'Terjadi kesalahan saat mencoba menambahkan data. Silahkan hubungi admin.'));
            }
        }
        return redirect()->route('pinjaman.show', $idPinjaman)->with('status', array('status' => 'Berhasil', 'message' => 'Data berhasil dimasukkan.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataPinjaman = Pinjaman::where('idPinjaman', $id)->first();
        $dataAnggota = Anggota::where('noAnggota', $dataPinjaman->noAnggota)->first('namaAnggota');
        $dataDetail = PinjamanDetail::where('idPinjaman', $id)->get();

        return view('pinjaman.show', compact('dataPinjaman', 'dataAnggota', 'dataDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyDetails = PinjamanDetail::where('idPinjaman', $id)->delete();
        if ($destroyDetails) {
            $destroyData = Pinjaman::where('idPinjaman', $id)->delete();
            if ($destroyData) {
                return redirect()->route('pinjaman.index')->with('status', array('status' => 'Berhasil', 'message' => 'Data berhasil dihapus.'));
            }
        }
        return redirect()->route('pinjaman.index')->with('status', array('status' => 'Error', 'message' => 'Terjadi kesalahan saat mencoba menghapus data. Silahkan hubungi admin.'));
    }

    public function bayarIndex($id) {
        $dataPinjaman = Pinjaman::where('idPinjaman', $id)->first();
        $dataAnggota = Anggota::where('noAnggota', $dataPinjaman->noAnggota)->first('namaAnggota');
        $dataDetail = PinjamanDetail::where('idPinjaman', $id)->get();
        return view('pinjaman.pembayaran.index', compact('dataPinjaman', 'dataDetail', 'dataAnggota'));
    }

    public function bayar($idPinjaman, $idDetail, Request $request) {
        $bayar = PinjamanDetail::where('idDetail', $idDetail)
        ->update([
            'tanggalPembayaran' => $request->tanggalPembayaran ? $request->tanggalPembayaran : date('Y-m-d'),
            'jumlahPembayaran' => $request->jumlahPembayaran
        ]);
        if ($bayar) {
            return redirect()->route('pembayaran.index', $idPinjaman)->with('status', ['status' => 'Berhasil', 'message' => 'Data berhasil diupdate.']);
        }
        return redirect()->route('pembayaran.index', $idPinjaman)->with('status', ['status' => 'Gagal', 'message' => 'Data gagal diupdate.']);
    }
}
