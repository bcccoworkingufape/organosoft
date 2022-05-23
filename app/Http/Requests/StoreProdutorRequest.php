<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutorRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Produtor::class);
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
            'cnpj' => ['required', 'string', 'unique:produtores'],
            'telefone' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'cep' => ['required', 'string','min:9','max:9'],
            'bairro' => ['required', 'string', 'max:255'],
            'rua' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'complemento' => ['nullable','string','max:255'],
            'ponto_referencia' => ['nullable','string','max:255'],
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
            'cnpj' => 'CNPJ',
        ];
    }
}
