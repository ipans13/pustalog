<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'kategories';
    protected $primaryKey = 'id';

    protected $fillable = ['kategori'];

    public function Bukus(): HasMany {

        return $this->hasMany(Buku::class, 'kategori_id');
    }

}
