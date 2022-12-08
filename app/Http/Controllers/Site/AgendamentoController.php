<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestLoginCliente;
use App\Mail\SendMailSolicitacaoAgendamento;
use App\Mail\SendMailAgendamentoCliente;

use Illuminate\Support\Facades\Mail;
use Response;
use DB;
use Validator;
use Session;
use Redirect;

use App\User;
use App\Agendamento;
use App\ModeloAgendamento;

class AgendamentoController extends Controller
{
    public function index(Request $request)
    {
        if($request->tipo!=""){
            $user_profissional_local = User::where('slug',$request->user)->first();
            $tipo = $request->tipo;
            $user = $user_profissional_local->nome;
            $slug = $user_profissional_local->slug;
        }else{
            $tipo = "";
            $user = "";
            $slug = "";
        }
       
        return view('Site.login',compact('tipo','user','slug'));
    }

    public function consulta_agendamento(Request $request)
    {
        $modelo = ModeloAgendamento::where('tipo',$request->tipo)->first();
        return response()->json($modelo->form);
    }

    public function login_cliente(RequestLoginCliente $request)
    {
        
        $cpf = $request->cpf_cnpj;
        $email = $request->email;
        $slug_user_agendamento = $request->profissional_local;

        try {
            $user = User::where('cpf_cnpj',$cpf)->where('email',$email)->first();

            if($user==null || $user==""){
                Session::flash('retorno', array('mensagem'=>'Não foi encontrado cadastro com esse CPF/E-Mail.',
                'titulo'=>'Atenção!','classe'=>'danger'));
                return back()->withInput();
            } else {
                if($slug_user_agendamento==""){
                    return view('Site.login2', compact('user'));
                }else{
                    $user_profissional_local = User::where('slug',$slug_user_agendamento)->first();
                    $profissional_local = $user_profissional_local->nome;
                    $tipo = $user_profissional_local->tipo;

                    return view('Site.agendamento', compact('user','tipo','slug_user_agendamento','profissional_local'));
                }
            }

        }catch(\Exception  $erro){
            Session::flash('retorno', array('mensagem'=>'Não foi encontrado cadastro com esse CPF/E-Mail.',
            'titulo'=>'Atenção!','classe'=>'danger'));
            return back()->withInput();
        }        
    }

    public function login_cliente_escolha($slug, $tipo)
    {
        try {

            $user = User::where('slug',$slug)->first();

            if($user==null || $user==""){
                Session::flash('retorno', array('mensagem'=>'Não foi encontrado cadastro com esse CPF/E-Mail.',
                'titulo'=>'Atenção!','classe'=>'danger'));
                return back()->withInput();
            } 

            if ($tipo=="" || ($tipo!="profissional" && $tipo!="coworking")) {
                Session::flash('retorno', array('mensagem'=>'Não foi possível identificar, o tipo de agendamento, tente novamente mais tarde.',
                'titulo'=>'Atenção!','classe'=>'danger'));
                return back()->withInput();
            } 

            $profissional_local = null;
            $slug_user_agendamento = null;

            return view('Site.agendamento', compact('user','tipo','slug_user_agendamento','profissional_local'));

        }catch(\Exception  $erro){
            Session::flash('retorno', array('mensagem'=>'Não foi encontrado cadastro com esse CPF/E-Mail, cadastre-se ou tente novamente mais tarde.',
            'titulo'=>'Atenção!','classe'=>'danger'));
            return back()->withInput();
        }        
    }

    public function agendamento(Request $request)
    {

        $email_envio = env('EMAIL_CONTATO');
       
            try {
                $user_profissional_local = User::where('slug',$request->profissional_local)->first();
                $user_cliente = User::where('slug',$request->cliente)->first();

                if ($request->profissional_local!="" && $user_profissional_local==null) {
                    return "erro";
                }
                
                if ($request->cliente=="" || $user_cliente==null || $user_cliente=="") {
                    return "erro";
                }

                if ($request->tipo=="" || ($request->tipo!="profissional" && $request->tipo!="coworking")) {
                    return "erro"."02";
                }

                $modelo = new Agendamento();
                $modelo->fk_user_cliente = $user_cliente->id;
                $modelo->fk_user = $user_profissional_local->id ?? null;
                $modelo->tipo = $request->tipo;
                $modelo->form = $request->formulario_render;
                $modelo->status = "solicitacao";
                DB::transaction(function () use ($modelo,$email_envio,$user_cliente) {
                    $modelo->save();
                    
                    Mail::to($email_envio)->send(new SendMailSolicitacaoAgendamento());
                    Mail::to($user_cliente->email)->send(new SendMailAgendamentoCliente($user_cliente->nome));
                });
               
                return "ok";

            }catch(\Exception  $erro){
                return "erro".$erro;
            }
           
    }
}
