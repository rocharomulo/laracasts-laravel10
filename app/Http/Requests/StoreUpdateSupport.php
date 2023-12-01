<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true; // não estamos validando acesso de usuários por enquanto...
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ]
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {  // se estivermos fazendo um UPDATE na tabela, mudar as validações
            $id = $this->support ?? $this->id;
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($this->support ?? $this->id) // o título do suporte deve ser único, mas ignorar quando o id for o mesmo
            ];
        }

        return $rules;
    }
}
