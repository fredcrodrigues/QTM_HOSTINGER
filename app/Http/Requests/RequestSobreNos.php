<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\SobreNos;

class RequestSobreNos extends FormRequest
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
                    'descricao' =>['required'],
                    'descricao_resumida' =>['required'],
                ];
            case 'POST':
                return [
                    'titulo' =>['required'],
                    'descricao' =>['required'],
                    'descricao_resumida' =>['required'],
                    'imagem_sobre' =>['required'],
                ];
        }
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->imagem_sobre == "" && empty(SobreNos::find($this->route('sobre_no'))->getFirstMedia('sobre-imagem')->file_name)) {
                $validator->errors()->add('imagem_sobre', 'O campo Imagem é obrigatório');
            }
        });
    }
    public function attributes(){
        return [
            'titulo' =>'Título',
            'descricao' =>'Descrição',
            'descricao_resumida' =>'Descrição Resumida',
            'imagem_sobre' => 'Imagem'
        ];
    }
}
