<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'produtores';

    protected $fillable = ['nome', 'cnpj', 'telefone', 'email', 'imagem'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function granjas()
    {
        return $this->hasMany(Granja::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
