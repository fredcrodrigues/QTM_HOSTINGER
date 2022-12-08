<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBanner extends FormRequest
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
                    'imagem_banner' =>['required'],
                ];
        }
       
    }

    public function attributes(){
        return [
                'titulo' =>'Título do Banner',
                'imagem_banner' =>'Imagem do Banner',
             ];
    }
}
