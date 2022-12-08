<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEspecialidade extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' =>['required'],
            'status' =>['required']
        ];
       
    }

    public function attributes(){
        return [
                'titulo' =>'Título',
                'status' =>'Status',
             ];
    }
}
