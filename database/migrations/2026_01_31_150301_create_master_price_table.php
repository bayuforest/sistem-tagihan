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
        Schema::create('master_price', function (Blueprint $table) {
            $table->increments('id'); // integer auto increment, not null
            $table->string('name', 20); // varchar(20), not null
            $table->integer('price')->default(0); // integer, default 0
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_price');
    }
};
