<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipamentoRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Equipamento::class);
    }

    /**
     * Obtem as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'min:1', 'max:255'],
            'data_compra' => ['required', 'date','before:tomorrow']
        ]
        ;
    }

    public function messages()
    {
        return [
            'data_compra.before' => 'Data de Compra deve ser menor ou igual a data atual',
        ];
    }
}
