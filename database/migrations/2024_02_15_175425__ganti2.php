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
        Schema::create('siswainv', function (Blueprint $table){
            $table->id();  
            $table->text('nama');  
            $table->string('kelas');
            $table->timestamps();  
        });

       Schema::create('baranginv', function (Blueprint $table) {
            $table->id();
            $table->text('nama_barang');
            $table->string('gambar');
            $table->timestamps();
       });

        Schema::create('peminjamaninv', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_barang');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->date('deadline');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswainv')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('baranginv')->onDelete('cascade');
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
