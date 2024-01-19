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
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->bigIncrements('idsuratmasuk');
            $table->foreignId('iduser');
            $table->integer('idbidang');
            $table->string('nosurat');
            $table->date('tglsurat');
            $table->date('tglditerima');
            $table->string('perihal');
            $table->string('pengirim');
            $table->string('foto');
            $table->string('ringkasan');
            $table->string('status')->default('Sedang Di Proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratmasuk');
    }
};