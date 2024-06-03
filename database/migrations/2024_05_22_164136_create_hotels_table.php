<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('hotels', function (Blueprint $table) {
        $table->id();
        $table->string('nama_hotel');
        $table->string('lokasi');
        $table->float('rating');
        $table->decimal('harga', 10, 2);
        $table->string('gambar');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};