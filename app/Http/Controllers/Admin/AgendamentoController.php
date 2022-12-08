<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use DataTables;
use DB;
use Session;
use Redirect;
use Auth;

use App\Agendamento;

class AgendamentoController extends Controller
{
    public function index()
    {
        return view('Admin.Agendamento.index');
    }

    public function show($id)
    {
        $agendamento = Agendamento::find($id);
        return view('Admin.Agendamento.show', compact('agendamento'));
    }

    public function solicitacao_atendida(Request $request)
    {
        try{
            $agendamento = Agendamento::find($request->agendamento);
            $agendamento->status = "atendido";
            
            DB::transaction(function() use ($agendamento) {
                $agendamento->save();
            });

            Session::flash('message_sucesso', 'Solicitação atendida com sucesso.');
            return Redirect::to('area-restrita/agendamento');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível atender solicitação, tente novamente.!');
            return back()->withInput();
        }
    }


    public function consulta_formulario_cliente(Request $request)
    {
        $modelo = Agendamento::find($request->agendamento);
        return response()->json($modelo->form);
    }

    public function list()
    {
        $agendamento = Agendamento::where('status','atendido');
        return Datatables::of($agendamento)
        ->editColumn('solicitacao', function ($agendamento) {
            return  date('d/m/Y H:i',strtotime($agendamento->created_at));
        })
        ->editColumn('cliente', function ($agendamento) {
            return  "<b>Nome:</b>".$agendamento->cliente->nome."<br>".
                     "<b>Telefone:</b>".$agendamento->cliente->telefone."<br>".
                     "<b>E-mail:</b>".$agendamento->cliente->email;
        })
        ->editColumn('tipo', function ($agendamento) {
            return  $agendamento->tipo;
        })
        ->editColumn('profissional_local', function ($agendamento) {
            if($agendamento->fk_user==""){
               return "não definido";
            }else{
                return  $agendamento->profissional_local->nome;
            }
        })
        ->editColumn('acao', function ($agendamento) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/agendamento/'.$agendamento->id.'/show"
                            class="btn btn-block btn-secondary"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }
}
