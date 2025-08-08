<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiWaktu extends Model
{
    use HasFactory;

    protected $fillable = [
    'judul',
    'deskripsi',
    'durasi',
    'tanggal_mulai',
    'tanggal_berakhir',
    'jenis_donasi',
    'user_id',
];

}
