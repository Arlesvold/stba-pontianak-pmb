<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stafs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto')->nullable();           // path gambar staf
            $table->string('posisi')->nullable();         // jabatan/dosen apa
            $table->unsignedInteger('display_order')->default(1); // urutan tampil
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stafs');
    }
};
