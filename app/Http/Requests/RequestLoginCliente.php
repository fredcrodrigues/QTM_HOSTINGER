<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLoginCliente extends FormRequest
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

    public function rules()
    {
        return [
            'email' =>['required'],
            'cpf_cnpj' => ['required','cpf'],
        ];
    }

    public function attributes(){
        return [
                'cpf_cnpj' =>'CPF',
                'email' =>'E-Mail',
             ];
    }
}
