<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSlide extends FormRequest
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
        return [
            'titulo' =>['required'],
            'conteudo' =>['required'],
            'botao' =>['required'],
            'link' =>['required'],
        ];
    }
    
    public function attributes(){
        return [
            'titulo' =>'Título',
            'conteudo' =>'Conteúdo',
            'botao' =>'Botão',
            'link' =>'Link do Botão',
        ];
    }
}
