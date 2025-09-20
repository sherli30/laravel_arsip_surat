<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('arsip', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nomor_surat', 100); // nomor surat
            $table->unsignedBigInteger('kategori_id'); // foreign key ke surat_kategori
            $table->string('judul', 255); // judul surat
            $table->string('pdf', 255); // nama file PDF
            $table->timestamps(); // created_at & updated_at otomatis

            // foreign key ke tabel surat_kategori
            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategori_surat')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
