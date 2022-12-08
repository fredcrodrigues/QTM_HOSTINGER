<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RequestSobreNos;
use Illuminate\Support\Facades\Input;

use App\SobreNos;

use Storage;
use Response;
use DataTables;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

class SobreNosController extends Controller
{
    public function index(){
        $sobre_nos = SobreNos::first();
        return view('Admin.SobreNos.index', compact('sobre_nos'));
    }
    public function update(RequestSobreNos $request,$id){
        try {
            
            $modelo = SobreNos::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->descricao = $request->descricao;
            $modelo->descricao_resumida = $request->descricao_resumida;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();

                if($modelo->getFirstMedia('sobre-imagem') == null){
                    $imagePath = $request->file('imagem_sobre');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-imagem','imagem_sobre');
                }
                
                else if($request->imagem_sobre != "" && $modelo->getFirstMedia('sobre-imagem')->file_name != $request->imagem_sobre){
                    
                    $modelo->clearMediaCollection('sobre-imagem');
                    $imagePath = $request->file('imagem_sobre');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-imagem','imagem_sobre');
                }
            });

            Session::flash('message_sucesso', 'Sobre Nós Alterado!');
            return Redirect::to('area-restrita/sobre-nos/');
       } catch (\Exception  $erro) {
           Session::flash('message_erro',$erro. 'Não foi possível alterar o Sobre Nós, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/sobre-nos/');
       }
    }
    
}
