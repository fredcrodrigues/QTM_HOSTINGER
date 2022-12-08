<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestContatoPaginaInicial;
use Illuminate\Support\Facades\Input;

use App\ContatoPaginaInicial;

use Response;
use Validator;
use Session;
use Redirect;

class ContatoPaginaInicialController extends Controller
{
    public function index(){
        $contato = ContatoPaginaInicial::first();
        return view('Admin.ContatoPaginaInicial.index', compact('contato'));
    }
    public function update(RequestContatoPaginaInicial $request,$id){
        try {
            
            $modelo = ContatoPaginaInicial::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;
            $modelo->email = $request->email;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
            });

            Session::flash('message_sucesso', 'Alteração realizada com sucesso');
            return Redirect::to('area-restrita/contato/');
       } catch (\Exception  $erro) {
           Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/contato/');
       }
    }
}
