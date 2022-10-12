<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSimpanan;
class JenisSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = JenisSimpanan::get();
        return view('jenissimpanan.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'namaJenis' => 'required',
            'jumlah' => 'required'
        ]);
        $query = JenisSimpanan::create($request->all());
        if ($query) {
            return redirect()->route('jenissimpanan.index')->with('status', 'Data berhasil diinput');
        }
        return redirect()->route('jenissimpanan.index')->with('status', 'Data gagal diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        JenisSimpanan::where('idJenis', $request->idJenis)->update([
            'namaJenis' => $request->namaJenis,
            'jumlah' => $request->jumlah
        ]);
        return redirect()->route('jenissimpanan.index')->with('status', 'Data berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = JenisSimpanan::where('idJenis', $id)->delete();
        if ($delete) {
            return redirect()->route('jenissimpanan.index')->with('status', 'Data berhasil dihapus.');
        }
        return redirect()->route('jenissimpanan.index')->with('status', 'Data gagal dihapus.');
    }

    public function getData($id) {
        $data = JenisSimpanan::where('idJenis', $id)->first();

        if ($data) {
            return response($data, 200);
        } 
        return response(0, 404);
    }
}
