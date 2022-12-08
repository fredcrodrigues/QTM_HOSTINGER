<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestObjetivo extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        
        return [
            'titulo' =>['required'],
            'conteudo_objetivo' =>['required'],
        ];
    }
    public function attributes(){
        return [
                'titulo' =>'Título do Objetivo',
                'conteudo_objetivo' =>'Conteúdo do Objetivo',
             ];
    }
}