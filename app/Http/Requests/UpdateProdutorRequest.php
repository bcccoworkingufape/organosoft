<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProdutorRequest extends FormRequest
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
            'nome' => ['required', 'string', 'min:5', 'max:255'],
            'cnpj' => ['required', 'string', 'cnpj', Rule::unique('produtores')->ignore($this->route('produtor'))],
            'telefone' => ['required', 'string', 'celular_com_ddd'],
            'email' => ['required', 'string', 'email'],
        ];
    }

    /**
     * Obtem atributos personalizados para erros do validador.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'e-mail',
            'cnpj' => 'CNPJ'
        ];
    }
}