<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspacosFabrica extends Model
{
    use HasFactory;

    public function fabrica()
    { 
        $this->belongsTo(Fabrica::class);
    }

    public function tipoItemEspacoFabrica()
    {
        $this->belongsTo(TipoItemEspacoFabrica::class);
    }
}
