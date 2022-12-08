<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestParceiro;
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

use App\Parceiro;

class ParceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Admin.Parceiro.index');
    }

    public function create()
    {
        return view ('Admin.Parceiro.create');
    }

    public function edit(Parceiro $slug)
    {

        $parceiro = Parceiro::where('id', $slug->id)->first();
        return view ('Admin.Parceiro.edit', compact('parceiro'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestParceiro $request)
    {
        try{
            $parceiro = new Parceiro();
            $parceiro->titulo = $request->titulo;
            
            DB::transaction(function() use ($parceiro,$request) {
                $parceiro->save();
                $imagePath = $request->file('imagem_parceiro');
                $parceiro->addMedia($imagePath)->toMediaCollection('parceiro-imagem','imagem_parceiro'); 
                
            });

            Session::flash('message_sucesso', 'Parceiro Criado!');
            return Redirect::to('area-restrita/parceiros/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível adicionar o Parceiro, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parceiro  $parceiro
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $parceiros = Parceiro::all();
        return Datatables::of($parceiros)
        ->editColumn('titulo', function ($parceiros) {
            return  '<span >'.$parceiros->titulo.'</span>';
        })
        ->editColumn('acao', function ($parceiros) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/parceiros/'.$parceiros->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$parceiros->slug.'">
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

    public function update(RequestParceiro $request, $id)
    {
        try{

            $parceiro = Parceiro::find($id);
            $parceiro->titulo = $request->titulo;
            
            DB::transaction(function() use ($parceiro,$request) {
                $parceiro->save();
                if($request->imagem_parceiro != "" && $parceiro->getFirstMedia('parceiro-imagem')->file_name != $request->imagem_parceiro){
                    
                    $parceiro->clearMediaCollection('parceiro-imagem');
                    $imagePath = $request->file('imagem_parceiro');
                    $parceiro->addMedia($imagePath)->toMediaCollection('parceiro-imagem','imagem_parceiro');
                }
            });
            Session::flash('message_sucesso', 'Parceiro Alterado!');
            return Redirect::to('area-restrita/parceiros/'.$parceiro->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro',$erro.'Não foi possível alterar o Parceiro, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parceiro  $parceiro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $parceiro = Parceiro::where('slug', $id)->first();
            $parceiro->delete();
            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
    

}
