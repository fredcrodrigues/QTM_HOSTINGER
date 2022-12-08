<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestDepoimento;
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

use App\Depoimento;

class DepoimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Admin.Depoimento.index');
    }

    public function create()
    {
        return view ('Admin.Depoimento.create');
    }

    public function edit(Depoimento $slug)
    {

        $depoimento = Depoimento::where('id', $slug->id)->first();
        return view ('Admin.Depoimento.edit', compact('depoimento'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDepoimento $request)
    {
        try{
            $depoimento = new Depoimento();
            $depoimento->nome = $request->nome;
            $depoimento->texto = $request->texto;
            
            DB::transaction(function() use ($depoimento,$request) {
                $depoimento->save();
                $imagePath = $request->file('imagem_depoimento');
                $depoimento->addMedia($imagePath)->toMediaCollection('depoimento-imagem','imagem_depoimento'); 
                
            });

            Session::flash('message_sucesso', 'Depoimento Criado!');
            return Redirect::to('area-restrita/depoimentos/');

        }catch(\Exception  $erro){
            Session::flash('message_erro','Não foi possível adicionar o Depoimento, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depoimento  $depoimento
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $depoimentos = Depoimento::all();
        return Datatables::of($depoimentos)
        ->editColumn('nome', function ($depoimentos) {
            return  '<span >'.$depoimentos->nome.'</span>';
        })
        ->editColumn('acao', function ($depoimentos) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/depoimentos/'.$depoimentos->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$depoimentos->slug.'">
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

    public function update(RequestDepoimento $request, $id)
    {
        try{
           
            $depoimento = Depoimento::find($id);
            $depoimento->nome = $request->nome;
            $depoimento->texto = $request->texto;
            
            DB::transaction(function() use ($depoimento,$request) {
                $depoimento->save();
                if($request->imagem_depoimento != "" && $depoimento->getFirstMedia('depoimento-imagem')->file_name != $request->imagem_depoimento){
                    
                    $depoimento->clearMediaCollection('depoimento-imagem');
                    $imagePath = $request->file('imagem_depoimento');
                    $depoimento->addMedia($imagePath)->toMediaCollection('depoimento-imagem','imagem_depoimento');
                }
            });
            Session::flash('message_sucesso', 'Depoimento Alterado!');
            return Redirect::to('area-restrita/depoimentos/'.$depoimento->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro',$erro.'Não foi possível alterar o Depoimento, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depoimento  $depoimento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $depoimento = Depoimento::where('slug', $id)->first();
            $depoimento->delete();
            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
   
}
