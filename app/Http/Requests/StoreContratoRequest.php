<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContratoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'granjas' => ['required', 'array', 'min:1'],
            'arquivo' => ['required', 'file'],
            'status' => ['required', 'string'],
            'outro' => ['required_if:status,outro', 'nullable', 'string'],
            'frequencia_coleta' => ['required', 'string'],
            'observacao' => ['nullable', 'string'],
            'valor' => ['required', 'numeric'],
            'inicio' => ['required', 'date'],
            'fim' => ['required', 'date', 'after:inicio'],
        ];
    }

    public function attributes()
    {
        return [
            'frequencia_coleta' => 'frequência de coleta',
            'observacao' => 'observação',
            'inicio' => 'data de início',
            'fim' => 'data final',
        ];
    }

    public function messages()
    {
        return [
            'outro.required_if' => 'É necessário informar o status quando selecionar "outro".',
            'granjas.*' => 'Selecione ao menos uma granja',
        ];
    }

    protected function prepareForValidation()
    {
        $valor_sem_ponto = str_replace('.', '', $this->valor);
        $valor_com_ponto = str_replace(',', '.', $valor_sem_ponto);
        $this->merge([
            'valor' => floatval($valor_com_ponto),
        ]);
    }
}
