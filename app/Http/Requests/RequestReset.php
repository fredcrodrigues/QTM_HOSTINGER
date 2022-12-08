<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestReset extends FormRequest
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
        return [
            'password' => 'required|min:8', 
            'password_confirmation' => 'required|min:8|same:password',
            
        ];
    }

    public function attributes(){
        return [
                'password' =>'Senha',
                'password_confirmation' =>'Confirmação de Senha',
             ];
    }
}
