<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEspacosFabricaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', EspacosFabrica::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'tipo_item_espaco_fabrica_id' => ['required', 'int'],
            'observacoes' => ['nullable', 'string', 'min:3', 'max:255'],
            'largura' => ['required', 'numeric'],
            'altura' => ['required', 'numeric'],
            'comprimento' => ['required', 'numeric'],
        ];
    }
}
