<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaVeiculo extends Model
{
    protected $fillable = ['descricao', 'fabrica_id'];
    
    public function fabrica()
    {
        return $this->belongsTo(Fabrica::class);
    }
}
