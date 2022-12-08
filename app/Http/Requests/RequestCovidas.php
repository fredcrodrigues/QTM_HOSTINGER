<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Covidas;
class RequestCovidas extends FormRequest
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
        
        $method = $this->method();

        if (null !== $this->get('_method', null)) {
            $method = $this->get('_method');
        }

        $this->offsetUnset('_method');

        switch ($method) {
            case 'PUT':
                return [
                    'conteudo' =>['required'],
                ];
            case 'POST':
                return [
                    'conteudo' =>['required'],
                    'imagem_covidas' =>['required'],
                ];
        }
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->imagem_covidas == "" && empty(Covidas::find(1)->getFirstMedia('covidas-imagem')->file_name)) {
                $validator->errors()->add('imagem_covidas', 'O campo Imagem é obrigatório');
            }
        });
    }

    public function attributes(){
        return [
                'conteudo' =>'Conteúdo',
                'imagem_covidas' =>'Imagem',
             ];
    }
}
