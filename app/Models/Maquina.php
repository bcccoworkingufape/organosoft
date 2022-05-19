<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $fillable = ['marca','modelo','chassi','placa','ano','equipamento_id','fabrica_id'];

    public function fabrica()
    {
        return $this->belongsTo(Fabrica::class);
    }

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }
}