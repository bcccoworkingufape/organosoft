<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoItemEspacoFabrica extends Model
{
    use HasFactory;

    public function espacosFabricas()
    {
        $this->hasMany(EspacosFabrica::class);
    }
}
