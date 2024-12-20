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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('status_pendaftaran', []);
            $table->enum('program_pendidikan', ['pondok', 'mts', 'ma']);
            $table->integer('NISN');
            $table->integer('NIK');
            $table->integer('nomor_kk');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'wanita']);
            $table->string('jumlah_saudara');
            $table->string('photo');
            $table->integer('anak_ke');
            $table->string('sekolah_asal');
            $table->string('ayah_kandung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
