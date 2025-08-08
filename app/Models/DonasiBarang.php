<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
    ];

    /**
     * Relasi ke tabel donasi_barang_masuks
     */
    public function barangMasuk()
    {
        return $this->hasMany(DonasiBarangMasuk::class, 'donasi_barang_id');
    }
}
