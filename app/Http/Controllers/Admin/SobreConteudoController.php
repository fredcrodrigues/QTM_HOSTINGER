<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestSobreConteudo;
use Illuminate\Support\Facades\Input;

use App\SobreConteudo;

use Storage;
use Response;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;


class SobreConteudoController extends Controller
{
    public function index(){
        $sobre_nos = SobreConteudo::first();
        return view('Admin.Sobre.conteudo', compact('sobre_nos'));
    }
    public function update(RequestSobreConteudo $request,$id){
        try {
            
            $modelo = SobreConteudo::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
            return Redirect::to('area-restrita/sobre-nos-conteudo/');
       } catch (\Exception  $erro) {
           Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/sobre-nos-conteudo/');
       }
    }
}
