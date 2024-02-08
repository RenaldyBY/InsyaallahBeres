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
        Schema::create('pengajuan_surat_details', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nama_kolom')->nullable();
            $table->text('isi_kolom')->nullable();
            $table->timestamps();

            $table->foreign('no_surat')->references('no_surat')->on('pengajuan_surats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surat_details');
    }
};
