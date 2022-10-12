<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;

    protected $table = 'pengambilan';
    protected $primarykey = 'idPengambilan';

    protected $fillable = [
        'idPengambilan',
        'tanggalPengambilan',
        'noAnggota',
        'jumlah',
        'userId'
    ];
}
