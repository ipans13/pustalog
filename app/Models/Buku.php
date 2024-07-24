<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Buku extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_buku';
    protected $primaryKey = 'id';

    protected $fillable = ['id_referensi','judul','kategori_id','jml_halaman','tahun','penerbit','penulis','desc','img'];

    public function kategori(): BelongsTo {
        return $this->belongsTo(kategories::class, 'kategori_id');
    }
}
