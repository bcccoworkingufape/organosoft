<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = ['nome','data_compra','fabricas_id'];

    public function fabrica()
    {
        return $this->belongsTo(Fabrica::class);
    }

    public function maquinas()
    {
        return $this->hasMany(Maquina::class);
    }
}
