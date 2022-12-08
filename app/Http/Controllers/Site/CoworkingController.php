<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCoworking;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

use App\Mail\SendMailCadastroPlataforma;
use App\Mail\SendMailRetornoSistema;

use Illuminate\Support\Facades\Mail;

use Response;
use DB;
use Validator;
use Session;
use Redirect;

use App\User;
use App\Endereco;
use App\Cidade;
use App\Estado;

class CoworkingController extends Controller
{
    public function index()
    {
        $estado = Estado::get();
        return view('Site.coworking', compact('estado'));
    }

    public function index_agendamento()
    {
        return view('Site.agendamento_coworking');
    }

    public function store(RequestCoworking $request)
    {
        $email_envio = env('EMAIL_CONTATO');
       
            try {

                $estado = Estado::where('sigla',$request->estado)->first();
                $modelo = new User();
                $modelo->nome = $request->nome;
                $modelo->cpf_cnpj = $request->cpf_cnpj;
                $modelo->telefone = $request->telefone;
                $modelo->email = $request->email;
                $modelo->password = bcrypt($request->cnpj);
                $modelo->tipo = "coworking";
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
                    
                    $modelo->assignRole('coworking');

                    $imagePath_foto = $request->file('imagem_cliente');
                    if($request->file('imagem_cliente')!=null || $request->file('imagem_cliente')!=""){
                        $modelo->addMedia($imagePath_foto)->toMediaCollection('cliente-imagem','imagem_cliente');
                    }

                    $imagePath_comprovante = $request->file('comprovante_residencia');
                    if($request->file('comprovante_residencia')!=null || $request->file('comprovante_residencia')!=""){
                        $modelo->addMedia($imagePath_comprovante)->toMediaCollection('comprovante-residencia','comprovante_residencia');
                    }

                    $imagePath_licenca = $request->file('licenca_funcionamento');
                    if($request->file('licenca_funcionamento')!=null || $request->file('licenca_funcionamento')!=""){
                        $modelo->addMedia($imagePath_licenca)->toMediaCollection('licenca-funcionamento','licenca_funcionamento');
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

    //Select Cidade
   public function select_cidade(Request $request){
    //consulta no banco
     $dados_cidades = Cidade::join('estados', 'estados.id', '=', 'cidades.fk_estado')
     ->where('estados.sigla',$request->sigla)
     ->select('cidades.nome','cidades.id')->orderBy('cidades.nome')->get();
     //Array de cidade
     $cidades = array();
     foreach($dados_cidades as $dados_cidade){
         array_push($cidades,[
             'nome' => $dados_cidade->nome,
             'id' => $dados_cidade->id
         ]);
     }
     //retornando para o javascript
     return response()->json(['cidades' => $cidades]);
 }
}
