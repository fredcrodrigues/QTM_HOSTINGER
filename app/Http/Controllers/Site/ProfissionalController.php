<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestProfissional;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\Mail\SendMailCadastroPlataforma;
use App\Mail\SendMailRetornoSistema;

use Illuminate\Support\Facades\Mail;

use Storage;
use Response;
use DataTables;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

use App\User;
use App\Endereco;
use App\Conselho;
use App\Especialidade;
use App\Estado;
use App\Agendamento;

class ProfissionalController extends Controller
{
    public function index()
    {
        $estado = Estado::get();
        $conselho = Conselho::where('status','1')->get();
        $especialidade = Especialidade::where('status','1')->get();
        return view('Site.profissional', compact('estado','conselho','especialidade'));
    }

    public function store(RequestProfissional $request)
    {
        $email_envio = env('EMAIL_CONTATO');
       
            try {
                $estado = Estado::where('sigla',$request->estado)->first();
                $modelo = new User();
                $modelo->nome = $request->nome;
                $modelo->cpf_cnpj = $request->cpf_cnpj;
                $modelo->rg = $request->rg;
                $modelo->telefone = $request->telefone;
                $modelo->email = $request->email;
                $modelo->conselho = "";
                $modelo->especialidade = $request->especialidade;
                $modelo->numero_conselho = "";
                $modelo->password = bcrypt($request->cnpj);
                $modelo->tipo = "profissional";
                $modelo->status = "pendente";

                $endereco = new Endereco();
                $endereco->logradouro = $request->logradouro;
                $endereco->numero = $request->numero;
                $endereco->bairro = $request->bairro;
                $endereco->cep = $request->cep;
                $endereco->fk_estado = $estado->id;
                $endereco->fk_cidade = $request->cidade;
                $endereco->complemento = $request->complemento;
                

                DB::transaction(function () use ($modelo,$email_envio,$endereco,$request) {
                    $modelo->save();
                    $endereco->fk_user = $modelo->id;
                    $endereco->save();
                    $modelo->assignRole('profissional');

                    $imagePath = $request->file('arquivo_registro');
                    if($request->file('arquivo_registro')!=null || $request->file('arquivo_registro')!=""){
                        $modelo->addMedia($imagePath)->toMediaCollection('registro','registro');
                    }

                    $imagePath_foto = $request->file('imagem_cliente');
                    if($request->file('imagem_cliente')!=null || $request->file('imagem_cliente')!=""){
                        $modelo->addMedia($imagePath_foto)->toMediaCollection('cliente-imagem','imagem_cliente');
                    }

                    Mail::to($modelo->email)->send(new SendMailCadastroPlataforma($modelo->nome));
                    Mail::to($email_envio)->send(new SendMailRetornoSistema());

                });
    
                Session::flash('retorno', array('mensagem'=>'Cadastro realizado com sucesso, estaremos analisando o seu cadastro e assim que estiver tudo ok, entraremos em contato.','titulo'=>'Sucesso!','classe'=>'success'));
                return back()->withInput();

            }catch(\Exception  $erro){
                Session::flash('retorno', array('mensagem'=>$erro.'Não foi possível realizar o cadastro, tente novamente mais tarde.',
                'titulo'=>'Atenção!','classe'=>'danger'));
                return back()->withInput();
            }
           
    }
}
