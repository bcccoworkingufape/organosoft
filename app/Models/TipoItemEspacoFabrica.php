<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoItemEspacoFabrica extends Model
{
    use HasFactory;

    protected $table = 'tipo_item_espaco_fabrica';

    protected $fillable = ['nome'];

    public function espacosFabricas()
    {
        return $this->hasMany(EspacosFabrica::class);
    }

    public function fabricas()
    {
        return $this->belongsTo(Fabrica::class);
    }
}
