<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVeiculoRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('produtor'));
    }

    /**
     * Obtem as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'marca' => [ 'string', 'min:5', 'max:255'],
            'chassi' => ['string', 'min:5', 'max:45'],
            'placa' => ['string', 'min:5', 'max:45'],
            'ano' => ['string', 'min:5', 'max:255']
        ];
    }

}
