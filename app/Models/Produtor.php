<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'produtores';

    protected $fillable = ['nome', 'cnpj', 'telefone', 'email', 'user_id', 'endereco_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function endereco()
    // {
    //     return $this->belongsTo(Endereco::class);
    // }
}
