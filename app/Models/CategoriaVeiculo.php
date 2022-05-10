<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaVeiculo extends Model
{
    protected $fillable = ['descricao'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
