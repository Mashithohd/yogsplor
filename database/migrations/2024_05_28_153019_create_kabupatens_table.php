<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatensTable extends Migration
{
    public function up()
    {
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kabupaten')->unique();
            $table->string('gambar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kabupatens');
    }
}
