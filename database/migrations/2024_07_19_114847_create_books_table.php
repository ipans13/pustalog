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
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id(); // Kolom auto-increment dan primary key
            $table->bigInteger('id_referensi')->unique();
            $table->string('judul');
            $table->foreignId('kategori_id')->constrained('kategories', 'id');// Tambahkan foreign key constraint
            $table->integer('jml_halaman'); // Ubah tipe data menjadi string dengan panjang 255
            $table->integer('tahun'); // Ubah tipe data menjadi string dengan panjang 255
            $table->string('penerbit');
            $table->string('penulis');
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_buku');
    }
};
