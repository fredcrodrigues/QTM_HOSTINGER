<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProdutoConteudo extends FormRequest
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
        ];
    }
    
    public function attributes(){
        return [
            'titulo' =>'Título',
            'conteudo' =>'Conteúdo',
        ];
    }
}
