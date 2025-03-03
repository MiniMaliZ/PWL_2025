<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // Fungsi yang akan dijalankan ketika ingin membuat perubahan pada tabel
    {
        Schema::create('items', function (Blueprint $table) { // Untuk Membuat tabel baru bernama items
            $table->id(); // menambahkan kolom id ke tabel
            $table->string('name'); // menambahkan kolom name ke tabel dengan tipe data string
            $table->text('description'); // menambahkan kolom description ke tabel dengan tipe data text
            $table->timestamps(); // menambahkan dua kolom ke tabel: created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
