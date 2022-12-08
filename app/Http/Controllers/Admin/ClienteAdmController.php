<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCliente;
use Illuminate\Http\Request;
use App\Http\Requests;
use DataTables;


use Session;
use Redirect;

use Response;
use DB;

use App\User;

class ClienteAdmController extends Controller
{
    public function index()
    {
        return view('Admin.ClienteAdm.index');
    }
    public function show(User $slug)
    {
        $cliente = User::where('id', $slug->id)->first();
        return view('Admin.ClienteAdm.show', compact('cliente'));
    }

    public function edit(User $slug)
    {
        $cliente = User::where('id', $slug->id)->first();
        return view('Admin.ClienteAdm.edit', compact('cliente'));
    }

    public function list()
    {
        $clientes = User::where('tipo','cliente')->get();
        return Datatables::of($clientes)
        ->editColumn('nome', function ($clientes) {
            return  $clientes->nome;
        })
        ->editColumn('telefone', function ($clientes) {
            return  $clientes->telefone;
        })
        ->editColumn('email', function ($clientes) {
            return  $clientes->email;
        })
        ->editColumn('acao', function ($clientes) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/cliente-adm/'.$clientes->slug.'/show"
                            class="btn btn-block btn-secondary"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/area-restrita/cliente-adm/'.$clientes->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>';
        })
        ->editColumn('criado', function ($clientes) {
            return  $clientes->created_at;
            
        })->escapeColumns([0])
        ->make(true);
    }
    public function update(RequestCliente $request, $id)
    {
        try {
            $modelo = User::find($id);
            $modelo->nome = $request->nome;
            $modelo->cpf_cnpj = $request->cpf_cnpj;
            $modelo->telefone = $request->telefone;
            $modelo->email = $request->email;
            $modelo->status = $request->status;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
                $imagePath = $request->file('imagem_cliente');
                if($request->file('imagem_cliente')!=null || $request->file('imagem_cliente')!=""){
                    $modelo->addMedia($imagePath)->toMediaCollection('cliente-imagem','imagem_cliente');
                }
            });


            Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
            return Redirect::to('area-restrita/cliente-adm/'.$modelo->slug.'/edit');
        } catch (\Exception  $erro) {
            Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
            return Redirect::to('area-restrita/cliente-adm/'.$modelo->slug.'/edit');
        }
    }
}
