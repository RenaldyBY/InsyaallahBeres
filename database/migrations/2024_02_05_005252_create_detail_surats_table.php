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
        Schema::create('detail_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kolom');
            $table->unsignedBigInteger('surat_id');
            $table->timestamps();

            $table->foreign('surat_id')->references('id')->on('surats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_surats');
    }
};
