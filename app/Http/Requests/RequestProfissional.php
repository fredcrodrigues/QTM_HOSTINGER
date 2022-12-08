<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class RequestProfissional extends FormRequest
{
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
                    'cpf_cnpj' => ['required','cpf',Rule::unique('users','cpf_cnpj')->ignore($this->route('profissional_adm'))],
                    'especialidade' =>['required'],
                    'telefone' =>['required'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->route('profissional_adm'))],
                    'cep' =>['required'],
                    'estado' =>['required'],
                    'cidade' =>['required'],
                    'logradouro' =>['required'],
                    'numero' =>['required'],
                    'bairro' =>['required'],
                    'latitude' =>['required'],
                    'longitude' =>['required'],
                ];
            case 'POST':
                return [
                    'nome' =>['required'],
                    'cpf_cnpj' => ['required','cpf','unique:users'],
                    'especialidade' =>['required'],
                    'telefone' =>['required'],
                    'email' => ['required', 'string', 'max:255','email','unique:users'],
                    'cep' =>['required'],
                    'estado' =>['required'],
                    'cidade' =>['required'],
                    'logradouro' =>['required'],
                    'numero' =>['required'],
                    'bairro' =>['required'],
                ];
        }
    }

    public function attributes(){
        return [
                'nome' =>'Nome do Local',
                'cpf_cnpj' =>'CPF',
                'especialidade' =>'Especialidade',
                'telefone' =>'Telefone p/ Contato',
                'email' =>'E-Mail',
                'cep' =>'CEP',
                'estado' =>'Estado',
                'cidade' =>'Cidade',
                'logradouro' =>'Logradouro',
                'numero' =>'Número',
                'bairro' =>'Bairro',
                'latitude' =>'Latitude',
                'longitude' =>'Longitude',
             ];
    }
}
