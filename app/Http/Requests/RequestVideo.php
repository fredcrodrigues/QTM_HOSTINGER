<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVideo extends FormRequest
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
                    'descricao' =>['required'],
                    'video' =>['required'],
                ];
            case 'POST':
                return [
                    'titulo' =>['required'],
                    'descricao' =>['required'],
                    'video' =>['required'],
                    'imagem_video' =>['required'],
                ];
        }
    }

    public function attributes(){
        return [
            'titulo' =>'Título',
            'descricao' =>'Descrição',
            'imagem_video' => 'Imagem',
            'video' =>'Link para o Video',
        ];
    }
}
