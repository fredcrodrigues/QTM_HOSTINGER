<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\SobrePrincipal;

class RequestSobrePrincipal extends FormRequest
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
        return [
            'titulo' =>['required'],
            'conteudo' =>['required'],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->imagem_sobre_principal_01 == "" && empty(SobrePrincipal::find(1)->getFirstMedia('sobre-principal-01')->file_name)) {
                $validator->errors()->add('imagem_sobre_principal_01', 'O campo Imagem Principal 01 é obrigatório');
            }

            if($this->imagem_sobre_principal_02 == "" && empty(SobrePrincipal::find(1)->getFirstMedia('sobre-principal-02')->file_name)) {
                $validator->errors()->add('imagem_sobre_principal_02', 'O campo Imagem Principal 02 é obrigatório');
            }
        });
    }
    public function attributes(){
        return [
            'titulo' =>'Título',
            'descricao' =>'Descrição',
            'descricao_resumida' =>'Descrição Resumida',
            'imagem_sobre_principal_01' => 'Imagem Principal 01',
            'imagem_sobre_principal_02' => 'Imagem Principal 02'
        ];
    }
}
