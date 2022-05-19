<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaquinaRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Maquina::class);
    }

    /**
     * Obtem as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'marca' => ['required', 'string', 'min:5', 'max:255'],
            'modelo' => ['required', 'string', 'min:5', 'max:255'],
            'chassi' => ['required', 'string', 'min:5', 'max:45'],
            'placa' => ['required', 'string', 'min:8', 'max:8'],
            'ano' => ['required', 'string', 'min:4', 'max:4'],
            'equipamento_id' => ['required', 'int'],
            'fabrica_id' => ['required', 'int']
        ];
    }
}
