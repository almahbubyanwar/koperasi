<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'pinjaman_details';
    protected $primarykey = 'idDetail';
    
    protected $fillable = [
        'idDetail',
        'idPinjaman',
        'cicilan',
        'angsuran',
        'bunga',
        'tanggalPembayaran',
        'jumlahPembayaran'
    ];
}
