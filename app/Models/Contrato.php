<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'frequencia_coleta',
        'status',
        'observacao',
        'caminho_documento',
        'inicio',
        'fim',
    ];

    public function granjas()
    {
        return $this->belongsToMany(Granja::class);
    }

    public function produtor()
    {
        return $this->belongsTo(Produtor::class);
    }
}
