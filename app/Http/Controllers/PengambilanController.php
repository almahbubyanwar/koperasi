<?php

namespace App\Http\Controllers;

use App\Models\Pengambilan;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class PengambilanController extends Controller
{
    public function index() {
        return view('pengambilan.index');
    }
    public function store(Request $request) {
        
    }
    public function search($idAnggota) {
        $search = Simpanan::where('noAnggota', $idAnggota)->get();
        return view('pengambilan.index', compact($search));
    }
}
