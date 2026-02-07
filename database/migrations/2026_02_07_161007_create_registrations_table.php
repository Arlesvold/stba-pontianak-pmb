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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Step 1 Data
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('program_studi');
            $table->string('sistem_kuliah');
            $table->string('sekolah_asal');
            $table->string('jurusan_sekolah')->nullable();
            $table->string('tahun_lulus');

            // Step 2 Data
            $table->string('ijazah_path')->nullable();
            $table->string('foto_path')->nullable();

            // Progress Tracking
            $table->integer('step')->default(1); // 1=Filled Form, 2=Filled Admin, 3=Verified/Done? 
            // Logic change: 
            // After Step 1 submit -> step becomes 2.
            // After Step 2 submit -> step becomes 3.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
