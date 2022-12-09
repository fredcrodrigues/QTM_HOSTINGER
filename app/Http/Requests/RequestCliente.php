<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCliente extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        if (null !== $this->get('_method', null)) {
            $method = $this->get('_method');
        }

        $this->offsetUnset('_method');
        switch ($method) {
            case 'PUT':
                return [
                    'nome' =>['required'],
                    'cpf_cnpj' => ['required'],//'cpf',Rule::unique('users','cpf_cnpj')->ignore($this->route('cliente_adm'))],
                    'telefone' =>['required'],
                    'email' => ['required'] //'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->route('cliente_adm'))],
                ];
            case 'POST':
                return [
                    'nome' =>['required'],
                    'cpf_cnpj' => ['required'],//,'cpf','unique:users'],
                    'telefone' =>['required'],
                    'email' => ['required']// 'string', 'max:255','email','unique:users'],
                ];
        }
    }

    public function attributes(){
        return [
                'nome' =>'Nome Completo',
                'cpf_cnpj' =>'CPF',
                'telefone' =>'Telefone p/ Contato',
                'email' =>'E-Mail',
             ];
    }
}
