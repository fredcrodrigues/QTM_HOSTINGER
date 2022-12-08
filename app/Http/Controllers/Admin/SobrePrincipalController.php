<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestSobrePrincipal;
use Illuminate\Support\Facades\Input;

use App\SobrePrincipal;

use Storage;
use Response;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;

class SobrePrincipalController extends Controller
{
    public function index(){
        $sobre_nos = SobrePrincipal::first();
        return view('Admin.Sobre.principal', compact('sobre_nos'));
    }
    public function update(RequestSobrePrincipal $request,$id){
        try {
            
            $modelo = SobrePrincipal::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();

                if($modelo->getFirstMedia('sobre-principal-01') == null){
                    $imagePath = $request->file('imagem_sobre_principal_01');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-principal-01','imagem_sobre_principal_01');
                } else if($request->imagem_sobre_principal_01 != "" && $modelo->getFirstMedia('sobre-principal-01')->file_name != $request->imagem_sobre_principal_01){
                    $modelo->clearMediaCollection('sobre-principal-01');
                    $imagePath = $request->file('imagem_sobre_principal_01');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-principal-01','imagem_sobre_principal_01');
                }

                if($modelo->getFirstMedia('sobre-principal-02') == null){
                    $imagePath = $request->file('imagem_sobre_principal_02');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-principal-02','imagem_sobre_principal_02');
                } else if($request->imagem_sobre_principal_02 != "" && $modelo->getFirstMedia('sobre-principal-02')->file_name != $request->imagem_sobre_principal_02){
                    
                    $modelo->clearMediaCollection('sobre-principal-02');
                    $imagePath = $request->file('imagem_sobre_principal_02');
                    $modelo->addMedia($imagePath)->toMediaCollection('sobre-principal-02','imagem_sobre_principal_02');
                }
            });

            Session::flash('message_sucesso', 'Alteração realizada com sucesso.');
            return Redirect::to('area-restrita/sobre-nos-principal/');
       } catch (\Exception  $erro) {
           Session::flash('message_erro',$erro. 'Não foi possível realizar alteração, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/sobre-nos-principal/');
       }
    }
}
