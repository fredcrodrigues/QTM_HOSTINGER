<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestEspecialidade;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Storage;
use Response;
use DataTables;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

use App\Especialidade;

class EspecialidadeController extends Controller
{
    public function index()
    {
        return view ('Admin.Especialidade.index');
    }

    public function create()
    {
        return view ('Admin.Especialidade.create');
    }

    public function edit(Especialidade $slug)
    {

        $modelo = Especialidade::where('id', $slug->id)->first();
        return view ('Admin.Especialidade.edit', compact('modelo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEspecialidade $request)
    {
        try{
            $especialidade = new Especialidade();
            $especialidade->titulo = $request->titulo;
            $especialidade->status = $request->status;
            
            DB::transaction(function() use ($especialidade) {
                $especialidade->save();
            });

            Session::flash('message_sucesso', 'Cadastro realizado com sucesso');
            return Redirect::to('area-restrita/especialidade/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível realizar cadastro, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depoimento  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $especialidade = Especialidade::all();
        return Datatables::of($especialidade)
        ->editColumn('titulo', function ($especialidade) {
            return  $especialidade->titulo;
        })
        ->editColumn('status', function ($especialidade) {
            if($especialidade->status==1){
                return  "ativo";
            }else{
                return  "inativo";
            }
        })
        ->editColumn('acao', function ($especialidade) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/especialidade/'.$especialidade->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function update(RequestEspecialidade $request, $id)
    {
        try{
           
            $especialidade = Especialidade::find($id);
            $especialidade->titulo = $request->titulo;
            $especialidade->status = $request->status;
            
            DB::transaction(function() use ($especialidade) {
                $especialidade->save();
            });

            Session::flash('message_sucesso', 'Cadastro alterado com sucesso.');
            return Redirect::to('area-restrita/especialidade/'.$especialidade->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro','Não foi possível alterar o cadastro, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depoimento  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $especialidade = Especialidade::where('slug', $id)->first();
            $especialidade->status = 0;
            $especialidade->save();

            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
}
