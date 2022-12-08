<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCoworking;
use App\Http\Requests;
use DataTables;
use Response;
use DB;

use App\User;
use App\Endereco;
use App\Estado;
use App\ModeloAgendamento;

class CoworkingAdmController extends Controller
{
    public function index()
    {
        return view('Admin.CoworkingAdm.index');
    }

    public function edit_agendamento()
    {
        return view('Admin.CoworkingAdm.modelo_coworking');
    }

    public function consulta_agendamento()
    {
        $modelo = ModeloAgendamento::where('tipo','coworking')->first();
        return response()->json($modelo->form);
    }

    public function update_agendamento(Request $request)
    {
            try {
                $modelo = ModeloAgendamento::where('tipo','coworking')->first();
                $modelo->form = $request->formulario;

                DB::transaction(function () use ($modelo) {
                    $modelo->save();
                });
    
                return "ok";

            }catch(\Exception  $erro){
                return "erro";

            }
    }

    public function show(User $slug)
    {
        $coworking = User::where('id', $slug->id)->first();
        $endereco = Endereco::where('fk_user',$slug->id)->first();
        return view('Admin.CoworkingAdm.show', compact('coworking', 'endereco'));
    }

    public function edit(User $slug)
    {
        $estado = Estado::get();
        $coworking = User::where('id', $slug->id)->first();
        $cidade = Cidade::where('fk_estado',$coworking->endereco->fk_estado)->get();
        return view('Admin.CoworkingAdm.edit', compact('coworking','estado','cidade'));
    }

    public function list()
    {
        $coworking = User::where('tipo','coworking')->where('status','ativo')->get();
        return Datatables::of($coworking)
        ->editColumn('nome', function ($coworking) {
            return  $coworking->nome;
        })
        ->editColumn('telefone', function ($coworking) {
            return  $coworking->telefone;
        })
        ->editColumn('email', function ($coworking) {
            return  $coworking->email;
        })
        ->editColumn('acao', function ($coworking) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/coworking-adm/'.$coworking->slug.'/show"
                            class="btn btn-block btn-secondary"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>';
        })
        ->editColumn('criado', function ($coworking) {
            return  $coworking->created_at;
            
        })->escapeColumns([0])
        ->make(true);
    }

    public function update(RequestCoworking $request,$id)
    {
       
            try {
                $estado = Estado::where('sigla',$request->estado)->first();

                $modelo = User::find($id);
                $modelo->nome = $request->nome;
                $modelo->cpf_cnpj = $request->cpf_cnpj;
                $modelo->telefone = $request->telefone;
                $modelo->email = $request->email;
                $modelo->status = $request->status;

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

                    if($modelo->getFirstMedia('comprovante-residencia') == null){
                        $imagePath = $request->file('comprovante_residencia');
                        $modelo->addMedia($imagePath)->toMediaCollection('comprovante-residencia','comprovante_residencia');
                    } else if($request->comprovante_residencia != "" && $modelo->getFirstMedia('comprovante-residencia')->file_name != $request->comprovante_residencia){
                        
                        $modelo->clearMediaCollection('comprovante-residencia');
                        $imagePath = $request->file('comprovante_residencia');
                        $modelo->addMedia($imagePath)->toMediaCollection('comprovante-residencia','comprovante_residencia');
                    }


                    if($modelo->getFirstMedia('licenca-funcionamento') == null){
                        $imagePath = $request->file('licenca_funcionamento');
                        $modelo->addMedia($imagePath)->toMediaCollection('licenca-funcionamento','licenca_funcionamento');
                    } else if($request->licenca_funcionamento != "" && $modelo->getFirstMedia('licenca-funcionamento')->file_name != $request->licenca_funcionamento){
                        
                        $modelo->clearMediaCollection('licenca-funcionamento');
                        $imagePath = $request->file('licenca_funcionamento');
                        $modelo->addMedia($imagePath)->toMediaCollection('licenca-funcionamento','licenca_funcionamento');
                    }

                });
    
                Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
                return Redirect::to('area-restrita/coworking-adm/'.$modelo->slug.'/edit');
           } catch (\Exception  $erro) {
               Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
               return Redirect::to('area-restrita/coworking-adm/'.$modelo->slug.'/edit');
           }
    }
}
