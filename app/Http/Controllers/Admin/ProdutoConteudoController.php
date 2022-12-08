<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestProdutoConteudo;
use Illuminate\Support\Facades\Input;

use App\ProdutoConteudo;

use Storage;
use Response;
use DataTables;
use DB;
use Validator;
use Session;
use Redirect;
use Auth;


class ProdutoConteudoController extends Controller
{
    public function index(){
        $produto = ProdutoConteudo::first();
        return view('Admin.Produto.conteudo', compact('produto'));
    }
    public function update(RequestProdutoConteudo $request,$id){
        try {
            
            $modelo = ProdutoConteudo::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
            });

            Session::flash('message_sucesso', 'Cadastro alterado com sucesso.');
            return Redirect::to('area-restrita/produto-conteudo');
       } catch (\Exception  $erro) {
           Session::flash('message_erro','Não foi possível alterar o cadastro, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/produto-conteudo');
       }
    }
}
