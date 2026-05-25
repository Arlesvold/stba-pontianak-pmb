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
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique();   // d3, s1
            $table->string('nama');
            $table->string('jenjang', 10);           // D3, S1
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();
            $table->json('tujuan')->nullable();
            $table->json('peminatan')->nullable();   // [{icon, judul, deskripsi}]
            $table->text('kurikulum')->nullable();
            $table->string('kurikulum_pdf_url')->nullable();
            $table->text('karir_deskripsi')->nullable();
            $table->json('karir_list')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
