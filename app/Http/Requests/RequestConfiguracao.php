<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Configuracao;

class RequestConfiguracao extends FormRequest
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
                    'instagram' => ['required'],
                    'facebook' => ['required'],
                    'tiktok' => ['required'],
                    'politica_privacidade' => ['required'],
                    'uso_responsavel' => ['required'],
                    'termos' => ['required'],
                ];
            case 'POST':
                return [
                    'email' => ['required'],
                    'whatsapp' => ['required'],
                    'instagram' => ['required'],
                    'facebook' => ['required'],
                    'youtube' => ['required'],
                    'link_app_store' => ['required'],
                    'link_google_play' => ['required'],
                    'imagem_logomarca' => ['required'],
                ];
        }
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->imagem_logomarca == "" && empty(Configuracao::find($this->route('configuracao'))->getFirstMedia('logomarca-imagem')->file_name)) {
                $validator->errors()->add('imagem_logomarca', 'O campo Logomarca é obrigatório');
            }
        });
    }
    public function attributes(){
        return [
            'email' => 'E-mail',
            'whatsapp' => 'Whatsapp',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'politica_privacidade' => 'Politíca de Privacidade',
            'uso_responsavel' => 'Uso Responsável',
            'termos' => 'Termos',
        ];
    }
}
