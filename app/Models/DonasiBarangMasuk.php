<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiBarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'donasi_barang_id',
        'nama_pengirim',
        'nomor_telepon_pengirim',
        'alamat_pengirim',
        'deskripsi',
        'foto_barang',
    ];

    /**
     * Relasi ke DonasiBarang
     */
    public function donasiBarang()
    {
        return $this->belongsTo(DonasiBarang::class, 'donasi_barang_id');
    }
}
