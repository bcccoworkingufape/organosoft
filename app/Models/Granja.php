<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Granja extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'quant_aves'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function produtor()
    {
        return $this->belongsTo(Produtor::class);
    }
}
