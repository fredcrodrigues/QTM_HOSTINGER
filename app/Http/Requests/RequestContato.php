<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContato extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' =>['required'],
            'email' =>['required'],
            'assunto' =>['required'],
            'mensagem' =>['required']
        ];
       
    }

    public function attributes(){
        return [
                'nome' =>'Nome',
                'email' =>'E-Mail',
                'assunto' =>'Assunto',
                'mensagem' =>'Mensagem',
             ];
    }
}
