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
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_matakuliah',10);
            $table->string('nama_matakuliah',100);
            $table->integer('semester');
            $table->enum('jenis_matakuliah',['Teori','Praktek']);
            $table->integer('sks');
            $table->integer('jam');
            $table->string('keterangan',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_matakuliahs');
    }
};
