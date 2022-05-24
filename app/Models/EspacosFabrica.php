<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspacosFabrica extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'observacoes', 'tipo_item_espaco_fabrica_id', 'largura', 'altura', 'comprimento'];

    public function fabrica()
    { 
        return $this->belongsTo(Fabrica::class);
    }

    public function tipoItemEspacoFabrica()
    {
        return $this->belongsTo(TipoItemEspacoFabrica::class);
    }
}
