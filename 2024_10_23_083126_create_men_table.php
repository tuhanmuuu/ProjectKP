<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensTable extends Migration
{
    public function up()
    {
        Schema::create('mens', function (Blueprint $table) {
            $table->id();
            $table->string('custom_image')->nullable(); // Untuk gambar custom yang di-upload pengguna
            $table->string('title'); // Ukuran produk
            $table->float('size')->nullable(); // Ukuran lingkar dada
            $table->float('notes')->nullable(); // Ukuran panjang tangan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mens');
    }
}
