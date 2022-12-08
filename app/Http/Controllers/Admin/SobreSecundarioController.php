<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RequestSobreSecundario;
use Illuminate\Support\Facades\Input;

use App\SobreSecundario;

use Storage;
use Response;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

class SobreSecundarioController extends Controller
{
    public function index(){
        $sobre_nos = SobreSecundario::first();
        return view('Admin.Sobre.secundario', compact('sobre_nos'));
    }
    public function update(RequestSobreSecundario $request,$id){
        try {
            
            $modelo = SobreSecundario::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();

                if($modelo->getFirstMedia('sobre-secundario-01') == null){
                    $imagePath = $request->file('imagem_sobre_secundario_01');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-secundario-01','imagem_sobre_secundario_01');
                } else if($request->imagem_sobre_secundario_01 != "" && $modelo->getFirstMedia('sobre-secundario-01')->file_name != $request->imagem_sobre_secundario_01){
                    
                    $modelo->clearMediaCollection('sobre-secundario-01');
                    $imagePath = $request->file('imagem_sobre_secundario_01');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-secundario-01','imagem_sobre_secundario_01');
                }

                if($modelo->getFirstMedia('sobre-secundario-02') == null){
                    $imagePath = $request->file('imagem_sobre_secundario_02');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-secundario-02','imagem_sobre_secundario_02');
                } else if($request->imagem_sobre_secundario_02 != "" && $modelo->getFirstMedia('sobre-secundario-02')->file_name != $request->imagem_sobre_secundario_02){
                    
                    $modelo->clearMediaCollection('sobre-secundario-02');
                    $imagePath = $request->file('imagem_sobre_secundario_02');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-secundario-02','imagem_sobre_secundario_02');
                }

                if($modelo->getFirstMedia('sobre-secundario-video') == null){
                    $imagePath = $request->file('video_sobre_secundario');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-secundario-video','video_sobre_secundario');
                } else if($request->video_sobre_secundario != "" && $modelo->getFirstMedia('sobre-secundario-video')->file_name != $request->video_sobre_secundario){
                    
                    $modelo->clearMediaCollection('sobre-secundario-video');
                    $imagePath = $request->file('video_sobre_secundario');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-secundario-video','video_sobre_secundario');
                }
            });

            Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
            return Redirect::to('area-restrita/sobre-nos-secundario/');
       } catch (\Exception  $erro) {
           Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/sobre-nos-secundario/');
       }
    }
}
