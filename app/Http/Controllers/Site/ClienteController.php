<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCliente;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

use App\Mail\SendMailCliente;

use Illuminate\Support\Facades\Mail;

use Response;
use DB;
use Validator;
use Session;
use Redirect;

use App\User;

class ClienteController extends Controller
{
    public function index()
    {
        return view('Site.cliente');
    }

    public function escolha_cadastro()
    {
        return view('Site.escolha_cadastro');
    }

    public function store(RequestCliente $request)
    {
            $email_envio = env('EMAIL_CONTATO');
            try {
                $modelo = new User();
                $modelo->nome = $request->nome;
                $modelo->cpf_cnpj = $request->cpf_cnpj;
                $modelo->telefone = $request->telefone;
                $modelo->email = $request->email;
                $modelo->password = bcrypt($request->cpf);
                $modelo->tipo = "cliente";
                $modelo->status = "ativo";
                $modelo->user_cpf = $request->cpf_cnpj . "_cliente";
    
                DB::transaction(function () use ($modelo,$email_envio,$request) {
                    $modelo->save();
                    $modelo->assignRole('cliente');
                    $imagePath = $request->file('imagem_cliente');
                    if($request->file('imagem_cliente')!=null || $request->file('imagem_cliente')!=""){
                        $modelo->addMedia($imagePath)->toMediaCollection('cliente-imagem','imagem_cliente');
                    }
                    

                    Mail::to($modelo->email)->send(new SendMailCliente($modelo->nome));

                });

    
                Session::flash('retorno', array('mensagem'=>'Cadastro realizado com sucesso, agora você pode solicitar agendamento atraveś da nossa plataforma','titulo'=>'Sucesso!','classe'=>'success'));
                return back()->withInput();

            }catch(\Exception  $erro){
                Session::flash('retorno', array('mensagem'=>'Não foi possível realizar o cadastro, o CPF já está cadastrado.',
                'titulo'=>'Atenção!','classe'=>'danger'));
                return back()->withInput();
            }
          
           
    }
}
