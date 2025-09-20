<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'arsip';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nomor_surat',
        'kategori_id',   // sesuai migration
        'judul',
        'pdf',
    ];

    // timestamps aktif (karena di migration pakai $table->timestamps())
    public $timestamps = true;

    /**
     * Relasi ke tabel kategori surat.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }

    public function relasi_kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }

}
