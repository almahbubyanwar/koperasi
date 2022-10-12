<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'pinjamandetail';
    protected $primarykey = 'idPinjaman';
    
    protected $fillable = [
        'idPinjaman',
        'cicilan',
        'angsuran',
        'bunga',
        'tanggalPembayaran',
        'jumlahPembayaran'
    ];
}
