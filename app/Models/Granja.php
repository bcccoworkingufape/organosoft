<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Granja extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'quant_aves'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function produtor()
    {
        return $this->belongsTo(Produtor::class,'produtor_id');
    }

    public function coletas()
    {
        return $this->hasMany(Coleta::class);
    }
}
