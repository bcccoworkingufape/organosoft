<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVeiculoRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Veiculo::class);
    }

    /**
     * Obtem as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'marca' => ['required', 'string', 'min:1', 'max:255'],
            'modelo' => ['required', 'string', 'min:1', 'max:255'],
            'chassi' => ['required', 'string', 'min:5', 'max:45'],
            'placa' => ['required', 'string', 'min:7', 'max:8'],
            'ano' => ['required', 'string', 'min:4', 'max:4'],
            'categorias_veiculos_id' => ['required', 'int']
        ];
    }
}
