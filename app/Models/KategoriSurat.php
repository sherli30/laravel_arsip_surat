<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;

    // Nama tabel sesuai migration
    protected $table = 'kategori_surat';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'keterangan',
    ];

    // Karena migration pakai $table->timestamps()
    public $timestamps = true;

    // Relasi: 1 kategori punya banyak arsip
    public function arsip()
    {
        return $this->hasMany(Arsip::class, 'kategori_id');
    }
}
