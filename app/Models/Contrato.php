<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'valor',
        'frequencia_coleta',
        'status',
        'observacao',
        'caminho_documento',
        'inicio',
        'fim',
    ];

    protected $casts = [
        'inicio' => 'date',
        'fim' => 'date',
        'valor' => 'float'
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
