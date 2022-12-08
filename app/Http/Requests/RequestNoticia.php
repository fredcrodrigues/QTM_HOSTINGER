<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestNoticia extends FormRequest
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
                    'conteudo' =>['required'],
                    'data' => ['required'],
                ];
            case 'POST':
                return [
                    'titulo' =>['required'],
                    'conteudo' =>['required'],
                    'data' => ['required'],
                    'imagem_noticia'=> ['required'],
                ];
        }
    }

    public function attributes(){
        return [
                'titulo' =>'Título da Notícia',
                'conteudo' =>'Conteúdo da Notícia',
                'data' => 'Data',
                'imagem_noticia' =>'Imagem de Destaque da Notícia',
           ];
    }
}
