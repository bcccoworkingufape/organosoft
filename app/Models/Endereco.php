<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['cep', 'cidade', 'estado', 'rua', 'bairro','numero','complemento','ponto_referencia'];
}
