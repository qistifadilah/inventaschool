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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_inventaris', 45);
            $table->string('nama_barang', 100);
            $table->string('kondisi', 45);
            $table->text('keterangan');
            $table->integer('stok');
            $table->foreignId('id_jenis')->constrained('jenis');
            $table->foreignId('id_ruang')->constrained('ruangs');
            $table->date('tanggal_register');
            $table->foreignId('id_user')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
