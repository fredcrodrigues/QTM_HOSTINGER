<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestProfissional;
use App\Http\Requests;
use DataTables;
use App\Mail\SendMailLiberacaoPlataforma;


use Response;
use DB;
use Session;
use Redirect;

use App\User;
use App\Estado;
use App\Cidade;
use App\Endereco;
use App\Conselho;
use App\Especialidade;
use App\ModeloAgendamento;



class ProfissionalAdmController extends Controller
{
    public function index()
    {
        return view('Admin.ProfissionalAdm.index');
    }

    public function edit_agendamento()
    {
        return view('Admin.ProfissionalAdm.modelo_profissional');
    }

    public function consulta_agendamento()
    {
        $modelo = ModeloAgendamento::where('tipo','profissional')->first();
        return response()->json($modelo->form);
    }

    public function update_agendamento(Request $request)
    {
            try {
                $modelo = ModeloAgendamento::where('tipo','profissional')->first();
                $modelo->form = $request->formulario;

                DB::transaction(function () use ($modelo) {
                    $modelo->save();
                });
    
                return "ok";

            }catch(\Exception  $erro){
                return "erro";

            }
    }

    public function edit(User $slug)
    {
       
        $estado = Estado::get();
        $profissional = User::where('id', $slug->id)->first();
        $cidade = Cidade::where('fk_estado',$profissional->endereco->fk_estado)->get();
        return view('Admin.ProfissionalAdm.edit', compact('profissional','estado','cidade'));
    }

    public function show(User $slug)
    {
        $estado = Estado::get();
        $profissional = User::where('id', $slug->id)->first();
        $endereco = Endereco::where('fk_user',$slug->id)->first();
        return view('Admin.ProfissionalAdm.show', compact('profissional','estado', 'endereco'));
    }

    public function list()
    {
        $profissional = User::where('tipo','profissional')->where('status','ativo')->get();
        return Datatables::of($profissional)
        ->editColumn('nome', function ($profissional) {
            return  $profissional->nome;
        })
        ->editColumn('telefone', function ($profissional) {
            return  $profissional->telefone;
        })
        ->editColumn('especialidade', function ($profissional) {
            return  $profissional->especialidade;
        })
        ->editColumn('email', function ($profissional) {
            return  $profissional->email;
        })
        ->editColumn('acao', function ($profissional) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/profissional-adm/'.$profissional->slug.'/show"
                            class="btn btn-block btn-secondary"
                            title="Visualizar Cadastro" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/area-restrita/profissional-adm/'.$profissional->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                      
                    </div>';
        })
         ->escapeColumns([0])
        ->make(true);
    }

//     <a href="/area-restrita/profissional-adm/'.$profissional->slug.'/edit"
//     class="btn btn-info"
//     title="Visualizar" data-toggle="tooltip">
//     <i class="fas fa-pencil-alt"></i>
//  </a>
    public function update(RequestProfissional $request,$id)
    {
            try {
                $estado = Estado::where('sigla',$request->estado)->first();

                $modelo = User::find($id);
                $modelo->nome = $request->nome;
                $modelo->cpf_cnpj = $request->cpf_cnpj;
                $modelo->rg = $request->rg;
                $modelo->telefone = $request->telefone;
                $modelo->email = $request->email;
                $modelo->conselho = "";
                $modelo->especialidade = $request->especialidade;
                $modelo->numero_conselho = "";
                $modelo->status = $request->status;;

                $endereco = Endereco::where('fk_user',$id)->first();
                $endereco->logradouro = $request->logradouro;
                $endereco->numero = $request->numero;
                $endereco->bairro = $request->bairro;
                $endereco->cep = $request->cep;
                $endereco->fk_estado = $estado->id;
                $endereco->fk_cidade = $request->cidade;
                $endereco->complemento = $request->complemento;
                $endereco->latitude = $request->latitude;
                $endereco->longitude = $request->longitude;
                

                DB::transaction(function () use ($modelo,$endereco,$request) {
                    $modelo->save();
                    $endereco->save();

                    if($modelo->getFirstMedia('cliente-imagem') == null){
                        $imagePath = $request->file('imagem_cliente');
                        $modelo->addMedia($imagePath)->toMediaCollection('cliente-imagem','imagem_cliente');
                    } else if($request->imagem_cliente != "" && $modelo->getFirstMedia('cliente-imagem')->file_name != $request->imagem_cliente){
                        
                        $modelo->clearMediaCollection('cliente-imagem');
                        $imagePath = $request->file('imagem_cliente');
                        $modelo->addMedia($imagePath)->toMediaCollection('cliente-imagem','imagem_cliente');
                    }

                    if($modelo->getFirstMedia('registro') == null){
                        $imagePath = $request->file('arquivo_registro');
                        $modelo->addMedia($imagePath)->toMediaCollection('registro','registro');
                    } else if($request->arquivo_registro != "" && $modelo->getFirstMedia('registro')->file_name != $request->arquivo_registro){
                        
                        $modelo->clearMediaCollection('registro');
                        $imagePath = $request->file('arquivo_registro');
                        $modelo->addMedia($imagePath)->toMediaCollection('registro','registro');
                    }

                });
    
                Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
                return Redirect::to('area-restrita/profissional-adm/'.$modelo->slug.'/edit');
           } catch (\Exception  $erro) {
               Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
               return Redirect::to('area-restrita/profissional-adm/'.$modelo->slug.'/edit');
           }
    }

   
}
