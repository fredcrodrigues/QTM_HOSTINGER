<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Storage;
use Response;
use DataTables;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

use App\User;
use App\Agendamento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index()
    {
        return view('Admin.home');
    }

    public function list_coworking()
    {
        $user = User::role(['coworking'])->where('status','pendente');
        return Datatables::of($user)
        ->editColumn('nome', function ($user) {
            return  $user->nome;
        })
        ->editColumn('telefone', function ($user) {
            return  $user->telefone;
        })
        ->editColumn('email', function ($user) {
            return  $user->email;
        })
        ->editColumn('acao', function ($user) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/coworking-adm/'.$user->slug.'/show"
                            class="btn btn-block btn-secondary"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/area-restrita/liberacao/'.$user->slug.'/edit"
                            class="btn btn-success"
                            title="Liberar Cadastro" data-toggle="tooltip">
                            <i class="fas fa-user-lock"></i>
                        </a>
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function list_profissional()
    {
        $user = User::role(['profissional'])->where('status','pendente');
        return Datatables::of($user)
        ->editColumn('nome', function ($user) {
            return  $user->nome;
        })
        ->editColumn('especialidade', function ($user) {
            return  $user->especialidade;
        })
        ->editColumn('telefone', function ($user) {
            return  $user->telefone;
        })
        ->editColumn('email', function ($user) {
            return  $user->email;
        })
        ->editColumn('acao', function ($user) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/profissional-adm/'.$user->slug.'/show"
                            class="btn btn-block btn-secondary"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/area-restrita/liberacao/'.$user->slug.'/edit"
                            class="btn btn-success"
                            title="Liberar Cadastro" data-toggle="tooltip">
                            <i class="fas fa-user-lock"></i>
                        </a>
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function list_agendamento()
    {
        $agendamento = Agendamento::where('status','solicitacao');
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
