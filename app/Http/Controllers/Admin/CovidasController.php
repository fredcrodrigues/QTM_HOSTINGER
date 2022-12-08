<?php

namespace App\Http\Controllers\Admin;

use Session;
use DB;
use Redirect; 
use DataTables;

use App\Covidas;
use App\Objetivo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RequestCovidas;
use App\Http\Requests\RequestObjetivo;

class CovidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $covidas = Covidas::first();
        return view('Admin.Covidas.index', compact('covidas'));
    }

    
    public function update(RequestCovidas $request,$id)
    {
        try{
            
                
            $covidas =  Covidas::find($id);
            $covidas->conteudo = $request->conteudo;
            
           DB::transaction(function() use ($covidas,$request) {
                $covidas->save();

                if($covidas->getFirstMedia('covidas-imagem') == null){
                    $imagePath = $request->file('imagem_covidas');
                    $covidas->addMedia($imagePath)->toMediaCollection('covidas-imagem','imagem_covidas');
                } 
                else if($request->imagem_covidas != "" && $covidas->getFirstMedia('covidas-imagem')->file_name != $request->imagem_covidas){
                    $covidas->clearMediaCollection('covidas-imagem');
                    $imagePath = $request->file('imagem_covidas');
                    $covidas->addMedia($imagePath)->toMediaCollection('covidas-imagem','imagem_covidas');
                }

            });

            Session::flash('message_sucesso', 'Covidas Alterado!');
            return Redirect::to('area-restrita/covidas-adm/');
        } catch (\Exception  $errors) {
            Session::flash('message_erro', $errors.'Não foi possível alterar Covidas, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
    public function updateObjetivo(RequestObjetivo $request,$id)
    {
        try{
            
                
            $objetivo =  Objetivo::find($id);
            $objetivo->titulo = $request->titulo;
            $objetivo->conteudo = $request->conteudo_objetivo;
            
           DB::transaction(function() use ($objetivo,$request) {
                $objetivo->save();
            });

            Session::flash('message_sucesso', 'Objetivo Alterado!');
            return Redirect::to('area-restrita/covidas-adm/');
        } catch (\Exception  $errors) {
            Session::flash('message_erro', $errors.'Não foi possível alterar objetivo, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
    
    public function edit_objetivo (Objetivo $slug){
        
        $objetivo =  Objetivo::where('id', $slug->id)->first();
        return view('Admin.Covidas.edit-objetivo', compact('objetivo'));
    }

    public function show (){
        $objetivos = Objetivo::all();
        return Datatables::of($objetivos)
        ->editColumn('titulo', function ($objetivos) {
            return  $objetivos->titulo;
        })
        ->editColumn('conteudo', function ($objetivos) {
            return  $objetivos->conteudo;
        })
        ->editColumn('acao', function ($objetivos) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/covidas-adm/'.$objetivos->slug.'/edit-objetivo"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$objetivos->slug.'">
                            <i class="fas fa-trash"></i>
                        </a>
                        
                    </div>';
        })
        ->editColumn('criado', function ($objetivos) {
            return  $objetivos->created_at;
            
        })->escapeColumns([0])
        ->make(true);
    }
    
    public function store_objetivo(Request $request){
        
        try{
            $objetivo =  new Objetivo();
            $objetivo->titulo = $request->titulo;
            $objetivo->conteudo = $request->conteudo_objetivo;
            
           DB::transaction(function() use ($objetivo,$request) {
                $objetivo->save();
            });

            return "ok";
        } catch (\Exception  $errors) {
            return "erro".$errors;
        }
    }
    public function destroy($id)
    {
        try {
            $objetivo =  Objetivo::where('slug',$id)->first();
            $objetivo->delete();
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
