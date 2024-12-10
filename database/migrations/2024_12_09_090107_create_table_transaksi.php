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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->unsignedInteger('id_pelanggan'); 
            $table->unsignedInteger('id_buku');     
            $table->date('tanggal_transaksi');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')
                  ->on('pelanggan')
                  ->onDelete('cascade') 
                  ->onUpdate('cascade'); 

            $table->foreign('id_buku')
                  ->references('id_buku')
                  ->on('buku')
                  ->onDelete('cascade') 
                  ->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi');
    }
};
