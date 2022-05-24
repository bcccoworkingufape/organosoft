<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = ['marca','modelo','chassi','placa','ano','categorias_veiculos_id'];

    public function fabrica()
    {
        return $this->belongsTo(Fabrica::class);
    }
}
