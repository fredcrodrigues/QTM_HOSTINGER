<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestServico;
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

use App\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servico = Servico::find(1);
        return view ('Admin.Servico.edit',compact('servico'));
    }

    public function create()
    {
        return view ('Admin.Servico.create');
    }

    public function edit(Servico $slug)
    {

        $servico = Servico::where('id', $slug->id)->first();
        return view ('Admin.Servico.edit', compact('servico'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestServico $request)
    {
        try{
            $servico = new Servico();
            $servico->titulo = $request->titulo;
            $servico->descricao = $request->descricao;
            
            DB::transaction(function() use ($servico,$request) {
                $servico->save();
                $imagePath = $request->file('imagem_servico');
                $servico->addMedia($imagePath)->toMediaCollection('servico-imagem','imagem_servico'); 
                
            });

            Session::flash('message_sucesso', 'Servico Criado!');
            return Redirect::to('area-restrita/servicos/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível adicionar o Servico, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $servicos = Servico::all();
        return Datatables::of($servicos)
        ->editColumn('titulo', function ($servicos) {
            return  '<span >'.$servicos->titulo.'</span>';
        })
        ->editColumn('acao', function ($servicos) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/servicos/'.$servicos->slug.'/edit"
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
    public function show(){
        //
    }

    public function update(RequestServico $request, $id)
    {
        try{
            $servico = Servico::find($id);
            $servico->titulo = "Nossos Serviços";
            $servico->link = $request->link;
            $servico->descricao = $request->descricao;
            
            DB::transaction(function() use ($servico,$request) {
                $servico->save();

                if($servico->getFirstMedia('servico-imagem') == null){
                    $imagePath = $request->file('imagem_servico');
                    $servico->addMedia($imagePath)->toMediaCollection('servico-imagem','imagem_servico');
                } else if($request->imagem_servico != "" && $servico->getFirstMedia('servico-imagem')->file_name != $request->imagem_servico){
                    $servico->clearMediaCollection('servico-imagem');
                    $imagePath = $request->file('imagem_servico');
                    $servico->addMedia($imagePath)->toMediaCollection('servico-imagem','imagem_servico');
                }
            });
            Session::flash('message_sucesso', 'Servico Alterado!');
            return Redirect::to('area-restrita/servicos/');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro',$erro.'Não foi possível alterar o Servico, tente novamente!');
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
            $servico = Servico::where('slug', $id)->first();
            $servico->delete();
            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
   
}
