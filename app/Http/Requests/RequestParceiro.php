<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestParceiro extends FormRequest
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
                    'titulo' =>['required'],
                ];
            case 'POST':
                return [
                    'titulo' =>['required'],
                    'imagem_parceiro' =>['required'],
                ];
        }
       
    }

    public function attributes(){
        return [
            'titulo' =>'Título',
            'imagem_parceiro' => 'Imagem',
        ];
    }
}
