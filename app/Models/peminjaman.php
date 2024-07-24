<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class peminjaman extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';

    protected $fillable = ['nama','id_referensi','token','waktu_pinjam','waktu_kembali'];


}