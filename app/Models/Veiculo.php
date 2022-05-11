<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = ['marca','chassi','placa','ano','categorias_veiculos_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
