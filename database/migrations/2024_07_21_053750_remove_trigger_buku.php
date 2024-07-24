<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER after_buku_keluar
        AFTER DELETE ON tbl_buku
        FOR EACH ROW
        BEGIN
            INSERT INTO laporan_msk_keluar (judul, penerbit, status, created_at,updated_at) 
            VALUES (OLD.judul, OLD.penerbit, "Keluar", NOW(),NOW());
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS laporan_msk_keluar');
    }
};
