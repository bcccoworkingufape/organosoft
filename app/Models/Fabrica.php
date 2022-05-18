<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabrica extends Model
{
    protected $fillable = [ 'nome', 'descricao' ];

    public function categoriaVeiculos()
    {
        return $this->hasMany(CategoriaVeiculo::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }
}
