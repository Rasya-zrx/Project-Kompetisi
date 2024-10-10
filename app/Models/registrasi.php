<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class registrasi extends Model
{
    use HasFactory;
    protected $table = 'registrasi';

    protected $fillable = [
        'user_id',
        'kompetisi_id',
        'tgl_registrasi',
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function kompetisi() : BelongsTo{
        return $this->belongsTo(kompetisi::class);
    }

    public function juara() : HasOne{
        return $this->hasOne(juara::class);
    }
}
