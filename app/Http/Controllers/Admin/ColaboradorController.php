<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestColaborador;
use App\Http\Requests\RequestAlterarSenha;
use App\Http\Requests;
use DataTables;


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



class ColaboradorController extends Controller
{
    public function index()
    {
        return view('Admin.Colaborador.index');
    }
    public function index_inativo()
    {
        return view('Admin.Colaborador.index_inativo');
    }
    public function create()
    {
        return view('Admin.Colaborador.create');
    }
    public function edit(User $slug)
    {
        $colaborador = User::where('id', $slug->id)->first();
        return view('Admin.Colaborador.edit', compact('colaborador'));
    }
    public function alterar_senha(User $slug)
    {
       
        $colaborador = User::where('id', $slug->id)->first();
        return view('Admin.Colaborador.alterar_senha', compact('colaborador'));
    }

    public function list()
    {
        $colaborador = User::where('tipo',null)->where('status','ativo')->get();
        return Datatables::of($colaborador)
        ->editColumn('nome', function ($colaborador) {
            return  $colaborador->nome;
        })
        ->editColumn('email', function ($colaborador) {
            return  $colaborador->email;
        })
        ->editColumn('acao', function ($colaborador) {
            return '<div class="btn-group btn-group-sm">
                        
                        <a href="/area-restrita/colaborador/'.$colaborador->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="/area-restrita/colaborador/'.$colaborador->slug.'/alterar-senha"
                            class="btn btn-success"
                            title="Alterar Senha" data-toggle="tooltip">
                            <i class="fas fa-lock"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$colaborador->slug.'">
                        <i class="fas fa-trash"></i>
                    </a>
                    </div>';
        })
         ->escapeColumns([0])
        ->make(true);
    }
    public function list_inativo()
    {
        $colaborador = User::onlyTrashed()->where('tipo','colaborador')->get();
        return Datatables::of($colaborador)
        ->editColumn('nome', function ($colaborador) {
            return  $colaborador->nome;
        })
        ->editColumn('email', function ($colaborador) {
            return  $colaborador->email;
        })
        ->editColumn('acao', function ($colaborador) {
            return '<div class="btn-group btn-group-sm">
                        <a href="javascript:void(0)" class="btn btn-info btnReativar"
                            title="Reativar" data-toggle="tooltip" data-id="'.$colaborador->slug.'">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>';
        })
         ->escapeColumns([0])
        ->make(true);
    }
    public function reativar($id){
        $modelo = User::onlyTrashed()->where('slug',$id);
        $modelo->restore();
        return Redirect::to('area-restrita/colaborador/');
    }

    public function destroy($id)
    {
        try {
            $colaborador =  User::where('slug',$id)->first();
            $colaborador->delete();
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
//     <a href="/area-restrita/colaborador/'.$colaborador->slug.'/edit"
//     class="btn btn-info"
//     title="Visualizar" data-toggle="tooltip">
//     <i class="fas fa-pencil-alt"></i>
//  </a>

    public function store (RequestColaborador $request) {
        try {
            $modelo = new User();
            $modelo->nome = $request->nome;
            $modelo->cpf_cnpj = $request->cpf_cnpj;
            $modelo->rg = $request->rg;
            $modelo->telefone = $request->telefone;
            $modelo->email = $request->email;
            $modelo->password = bcrypt($request->senha);
            $modelo->tipo = "colaborador";
            $modelo->status = "ativo";

            

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
                $modelo->assignRole('administrador');
            });

          
            Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
            return Redirect::to('area-restrita/colaborador/');
        } catch (\Exception  $erro) {
            Session::flash('message_erro',$erro. 'Não foi possível cadastrar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
    public function update(RequestColaborador $request,$id)
    {
            try {

                $modelo = User::find($id);
                $modelo->nome = $request->nome;
                $modelo->cpf_cnpj = $request->cpf_cnpj;
                $modelo->rg = $request->rg;
                $modelo->telefone = $request->telefone;
                $modelo->email = $request->email;
                $modelo->password = bcrypt($request->senha);
                $modelo->tipo = "colaborador";
                $modelo->status = "ativo";

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
                $modelo->assignRole('administrador');
            });
    
            Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
            return Redirect::to('area-restrita/colaborador/'.$modelo->slug.'/edit');
        } catch (\Exception  $erro) {
            Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
            return Redirect::to('area-restrita/colaborador/'.$modelo->slug.'/edit');
        }
    }
    public function update_senha(RequestAlterarSenha $request,$id)
    {
            try {

                $modelo = User::find($id);
                $modelo->password = bcrypt($request->senha);
                
            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
            });
    
            Session::flash('message_sucesso', 'Senha Alterada com sucesso.');
            return Redirect::to('area-restrita/colaborador/'.$modelo->slug.'/alterar-senha');
        } catch (\Exception  $erro) {
            Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
            return Redirect::to('area-restrita/colaborador/'.$modelo->slug.'/alterar-senha');
        }
    }
   
}
