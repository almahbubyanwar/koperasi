<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'noAnggota';

    protected $fillable = [
        'noAnggota',
        'namaAnggota',
        'jenisKelamin',
        'tempatLahir',
        'tanggalLahir',
        'alamat',
        'noTelepon',
        'noIdentitas',
        'pwd',
    ];
}
