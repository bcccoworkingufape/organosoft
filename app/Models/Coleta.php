<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleta extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'id_contrato',
        'id_veiculo',
        'id_granja',
        'hora',
        'data',
        'status',
        'motorista',
        'observacao'

    ];

    public function contrato(){
        return $this->belongsTo(Contrato::class);
    }

    /*
    public function veiculo(){
        return $this->belongsTo(Veiculo::class);
    }
    */

    public function granja(){
        return $this->belongsTo(Granja::class);
    }

    public function qualidadeColeta(){
        return $this->hasOne(QualidadeColeta::class);
    }

}
