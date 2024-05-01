<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'nama',
        'alamat',
        'no_wa',
        'keperluan',
        'tujuan',
        'lampiran',
        'jk',
        'pegawai',
    ];
}
