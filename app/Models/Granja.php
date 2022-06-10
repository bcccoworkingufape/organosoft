<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Granja extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'quant_aves', 'imagem'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function produtor()
    {
        return $this->belongsTo(Produtor::class);
    }

    public function contratos()
    {
        return $this->belongsToMany(Contrato::class);
    }

    public function coletas()
    {
        return $this->hasMany(Coleta::class);
    }
}
