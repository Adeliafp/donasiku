<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    // Jika nama tabel di database bukan "donasis", ubah sesuai nama tabel
    // protected $table = 'nama_tabel_donasi';

    // Kolom yang boleh diisi melalui mass assignment
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'jenis_donasi',
        'terkumpul',
        'target',
        'status',
    ];
}
