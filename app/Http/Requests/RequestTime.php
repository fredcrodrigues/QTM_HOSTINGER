<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Time;
class RequestTime extends FormRequest
{
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
                    'nome' =>['required'],
                    'cargo' =>['required'],
                    'conteudo' =>['required'],
                ];
            case 'POST':
                return [
                    'nome' =>['required'],
                    'cargo' =>['required'],
                    'conteudo' =>['required'],
                    'imagem_time' =>['required'],
                ];
        }
    }
    
    public function attributes(){
        return [
            'nome' =>'Nome Completo',
            'cargo' =>'Cargo na QTM',
            'conteudo' =>'Descrição',
            'imagem_time' => 'Foto'
        ];
    }
}
