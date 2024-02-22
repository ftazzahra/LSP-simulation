<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('intern', function (Blueprint $table){
            $table->id();  
            $table->text('nama');  
            $table->string('kelas');
            $table->timestamps();  
        });

       Schema::create('dudi', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->string('alamat');
            $table->timestamps();
       });

       Schema::create('pkl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_intern');
            $table->unsignedBigInteger('id_dudi');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->timestamps();

            $table->foreign('id_intern')->references('id')->on('intern')->onDelete('cascade');
            $table->foreign('id_dudi')->references('id')->on('dudi')->onDelete('cascade');
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
