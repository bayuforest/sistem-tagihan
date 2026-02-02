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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->increments('id');

            $table->date('bulan_tagihan'); // selalu tanggal 1

            $table->unsignedInteger('resident_id');

            $table->integer('meteran_awal');
            $table->integer('meteran_akhir');

            $table->integer('tagihan_air')->default(0);
            $table->integer('ipl');
            $table->integer('abodement');

            $table->timestamps();

            // foreign key
            $table->foreign('resident_id')
                  ->references('id')
                  ->on('residents')
                  ->onDelete('cascade');

            // cegah dobel tagihan per bulan per resident
            $table->unique(['resident_id', 'bulan_tagihan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
