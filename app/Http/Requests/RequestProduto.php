<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduto extends FormRequest
{
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
                    'conteudo' =>['required'],
                ];
            case 'POST':
                return [
                    'titulo' =>['required'],
                    'conteudo' =>['required'],
                    'imagem_produto' =>['required'],
                ];
        }
    }

    public function attributes(){
        return [
            'titulo' =>'Título',
            'conteudo' =>'Descrição do Produto',
            'imagem_produto' => 'Imagem de Destaque',
        ];
    }
}
