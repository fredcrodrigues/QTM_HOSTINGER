<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestColaborador extends FormRequest
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
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->route('colaborador'))],
                    
                ];
            case 'POST':
                return [
                    'nome' =>['required'],
                    'email' => ['required', 'string', 'max:255','email','unique:users'],
                    'senha' =>['required','min:8'],
                ];
        }
    }

    public function attributes(){
        return [
                'nome' =>'Nome Completo',
                'email' =>'E-Mail',
                'senha' => 'Senha',
             ];
    }
}
