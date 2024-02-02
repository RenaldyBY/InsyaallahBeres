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
        Schema::create('surat_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nomor_surat');
            $table->string('nama_anak');
            $table->string('jenis_kelamin');
            $table->string('anak_ke');
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_pelapor');
            $table->string('nik_pelapor');
            $table->string('hubungan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('id_user');
            $table->integer('id_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
