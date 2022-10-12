<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanan';
    protected $primarykey = 'idSimpanan';

    protected $fillable = [
        'idSimpanan',
        'tanggal',
        'noAnggota',
        'idJenis',
        'jumlah',
        'userId'
    ];
}
