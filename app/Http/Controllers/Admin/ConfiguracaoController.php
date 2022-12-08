<?php

namespace App\Http\Controllers\Admin;

use App\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RequestConfiguracao;
use Illuminate\Support\Facades\Input;

use Storage;
use Response;
use DataTables;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

class ConfiguracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function index()
    {
        $configuracao = Configuracao::first();
        return view('Admin.Configuracao.index', compact('configuracao'));
        
    }
    public function edit(configuracao $slug)
    {
    }

    public function store(Request $request)
    {
        
    }

    public function show(Configuracao $configuracao)
    {
       
    }

    public function update(RequestConfiguracao $request, $id)
    {
        try{
            $configuracao =  Configuracao::find($id);   
            $configuracao->instagram = $request->instagram;
            $configuracao->facebook = $request->facebook;
            $configuracao->tiktok = $request->tiktok;
            $configuracao->termos = $request->termos;
            $configuracao->politica_privacidade = $request->politica_privacidade;
            $configuracao->uso_responsavel = $request->uso_responsavel;
            
           DB::transaction(function() use ($configuracao,$request) {
                $configuracao->save();

                if($configuracao->getFirstMedia('logomarca-imagem') == null){
                    $imagePath = $request->file('imagem_logomarca');
                    $configuracao->addMedia($imagePath)->toMediaCollection('logomarca-imagem','imagem_logomarca');
                } else if($request->imagem_logomarca != "" && $configuracao->getFirstMedia('logomarca-imagem')->file_name != $request->imagem_logomarca){
                    
                    $configuracao->clearMediaCollection('logomarca-imagem');
                    $imagePath = $request->file('imagem_logomarca');
                    $configuracao->addMedia($imagePath)->toMediaCollection('logomarca-imagem','imagem_logomarca');
                }
            });

            Session::flash('message_sucesso', 'Configuração Alterada!');
            return Redirect::to('area-restrita/configuracao/');
        } catch (\Exception  $errors) {
            Session::flash('message_erro', $errors.'Não foi possível alterar a configuração, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function destroy(Configuracao $configuracao)
    {
       
    }
}
