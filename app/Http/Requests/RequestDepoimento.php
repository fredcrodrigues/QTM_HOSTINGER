<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDepoimento extends FormRequest
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
                    'texto' =>['required'],
                ];
            case 'POST':
                return [
                    'nome' =>['required'],
                    'texto' =>['required'],
                    'imagem_depoimento' =>['required'],
                ];
        }
       
    }

    public function attributes(){
        return [
            'nome' =>'Nome',
            'texto' =>'Texto',
            'imagem_depoimento' => 'Imagem',
        ];
    }
}
