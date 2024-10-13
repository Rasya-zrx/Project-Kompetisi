<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class juara extends Model
{
    use HasFactory;
    protected $table = 'juara';

    protected $fillable = [
        'registrasi_id',
        'keterangan_peringkat',
    ];
    
    public function registrasi() : BelongsTo {
        return $this->belongsTo(registrasi::class, 'registrasi_id');
    }    
   
}
