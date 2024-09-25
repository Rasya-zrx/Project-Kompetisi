<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class juara extends Model
{
    use HasFactory;
    protected $table = 'juara';

    public function kompetisi() : BelongsTo{
        return $this->belongsTo(kompetisi::class);
    }
    
    public function registrasi() : HasOne {
        return $this->hasOne(registrasi::class);
    }    
   
}
