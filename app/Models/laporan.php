<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan_msk_keluar';
    protected $primaryKey = 'id';

    protected $fillable = ['judul','penerbit','status','created_at','updated_at'];

}
