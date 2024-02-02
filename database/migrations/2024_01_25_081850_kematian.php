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
        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nomor_surat');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('tanggal_meninggal');
            $table->string('sebab_kematian');
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
