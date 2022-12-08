<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestServico extends FormRequest
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
                    'link' =>['required'],
                    'descricao' =>['required'],
                ];
            case 'POST':
                return [
                    'link' =>['required'],
                    'descricao' =>['required'],
                    'imagem_servico' =>['required'],
                ];
        }
    }

    public function attributes(){
        return [
            'titulo' =>'Título',
            'descricao' =>'Descrição',
            'imagem_servico' => 'Imagem',
        ];
    }
}
