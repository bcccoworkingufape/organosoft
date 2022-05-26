<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualidadeColeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_coleta',
        'avaliacaoQualidade',
        'descricao'

    ];

    public function coleta(){
        return $this->belongsTo(Coleta::class);
    }

}
