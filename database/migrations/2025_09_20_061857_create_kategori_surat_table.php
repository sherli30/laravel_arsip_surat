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
        Schema::create('kategori_surat', function (Blueprint $table) {
            $table->id(); // primary key auto increment
            $table->string('nama', 255); // nama kategori (wajib)
            $table->text('keterangan')->nullable(); // deskripsi kategori
            $table->timestamps(); // created_at & updated_at (opsional, tapi disarankan)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_surat');
    }
};
