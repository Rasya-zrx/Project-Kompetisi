<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kompetisi extends Model
{
    use HasFactory;
    protected $table = 'kompetisi';

    protected $fillable = [
        'nama_kompetisi',
        'deskripsi',
        'tgl_kompetisi',
        'tgl_buka_regist',
        'tgl_tutup_regist',
        'gambar',
    ];

    public function registrasi() : HasMany {
        return $this->hasMany(registrasi::class);
    }

}
