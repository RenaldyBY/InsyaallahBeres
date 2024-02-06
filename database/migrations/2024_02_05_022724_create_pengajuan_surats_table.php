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
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->string('no_surat');
            $table->unsignedBigInteger('surat_id');
            $table->unsignedBigInteger('penduduk_id');
            $table->date('tanggal_pengajuan');
            $table->char('status')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->primary('no_surat');
            $table->foreign('surat_id')->references('id')->on('surats');
            $table->foreign('penduduk_id')->references('id')->on('penduduks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};
