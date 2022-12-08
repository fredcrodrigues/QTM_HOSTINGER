<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestServicoOferecido;
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

use App\ServicoOferecido;

class ServicoOferecidoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Admin.ServicoOferecido.index');
    }

    public function create()
    {
        return view ('Admin.ServicoOferecido.create');
    }

    public function edit(ServicoOferecido $slug)
    {

        $servico = ServicoOferecido::where('id', $slug->id)->first();
        return view ('Admin.ServicoOferecido.edit', compact('servico'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestServicoOferecido $request)
    {
        try{
            $servico = new ServicoOferecido();
            $servico->titulo = $request->titulo;
            $servico->conteudo = $request->conteudo;
            
            DB::transaction(function() use ($servico,$request) {
                $servico->save();
                $imagePath = $request->file('imagem_servico');
                $servico->addMedia($imagePath)->toMediaCollection('servico-oferecido-imagem','imagem_servico_oferecido'); 
                
            });

            Session::flash('message_sucesso', 'Cadastro realizado com sucesso.');
            return Redirect::to('area-restrita/servico-oferecido/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível realizar o cadastro, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $servicos = ServicoOferecido::all();
        return Datatables::of($servicos)
        ->editColumn('titulo', function ($servicos) {
            return  '<span >'.$servicos->titulo.'</span>';
        })
        ->editColumn('acao', function ($servicos) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/servico-oferecido/'.$servicos->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$servicos->slug.'">
                            <i class="fas fa-trash"></i>
                        </a>
                        
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function update(RequestServicoOferecido $request, $id)
    {
        try{
           
            $servico = ServicoOferecido::find($id);
            $servico->titulo = $request->titulo;
            $servico->conteudo = $request->conteudo;
            
            DB::transaction(function() use ($servico,$request) {
                $servico->save();

                if($servico->getFirstMedia('servico-oferecido-imagem') == null){
                    $imagePath = $request->file('imagem_servico');
                    $servico->addMedia($imagePath)->toMediaCollection('servico-oferecido-imagem','imagem_servico');
                }
                
                else if($request->imagem_servico != "" && $servico->getFirstMedia('servico-oferecido-imagem')->file_name != $request->imagem_servico){
                    
                    $servico->clearMediaCollection('servico-oferecido-imagem');
                    $imagePath = $request->file('imagem_servico');
                    $servico->addMedia($imagePath)->toMediaCollection('servico-oferecido-imagem','imagem_servico');
                }

            });
            Session::flash('message_sucesso', 'Cadastro alterado com sucesso.');
            return Redirect::to('area-restrita/servico-oferecido/'.$servico->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro','Não foi possível alterar cadastro, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $servico = ServicoOferecido::where('slug', $id)->first();
            $servico->delete();
            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
   
}
