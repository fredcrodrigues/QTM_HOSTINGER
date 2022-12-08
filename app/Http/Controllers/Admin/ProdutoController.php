<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestProduto;
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

use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Admin.Produto.index');
    }

    public function create()
    {
        return view ('Admin.Produto.create');
    }

    public function edit(Produto $slug)
    {

        $produto = Produto::where('id', $slug->id)->first();
        return view ('Admin.Produto.edit', compact('produto'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduto $request)
    {
        try{
            $produto = new Produto();
            $produto->titulo = $request->titulo;
            $produto->conteudo = $request->conteudo;
            
            DB::transaction(function() use ($produto,$request) {
                $produto->save();
                $imagePath = $request->file('imagem_produto');
                $produto->addMedia($imagePath)->toMediaCollection('produto-imagem','imagem_produto'); 
                
            });

            Session::flash('message_sucesso', 'Cadastro realizado com sucesso.');
            return Redirect::to('area-restrita/produto/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível realizar o cadastro, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $produto
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $produtos = Produto::all();
        return Datatables::of($produtos)
        ->editColumn('titulo', function ($produtos) {
            return  '<span >'.$produtos->titulo.'</span>';
        })
        ->editColumn('acao', function ($produtos) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/produto/'.$produtos->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$produtos->slug.'">
                            <i class="fas fa-trash"></i>
                        </a>
                        
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function update(RequestProduto $request, $id)
    {
        try{
            $produto = Produto::find($id);
            $produto->titulo = $request->titulo;
            $produto->conteudo = $request->conteudo;
            
            DB::transaction(function() use ($produto,$request) {
                $produto->save();

                if($produto->getFirstMedia('produto-imagem') == null){
                    $imagePath = $request->file('imagem_produto');
                    $produto->addMedia($imagePath)->toMediaCollection('produto-imagem','imagem_produto');
                } else if($request->imagem_produto != "" && $produto->getFirstMedia('produto-imagem')->file_name != $request->imagem_produto){
                    $produto->clearMediaCollection('produto-imagem');
                    $imagePath = $request->file('imagem_produto');
                    $produto->addMedia($imagePath)->toMediaCollection('produto-imagem','imagem_produto');
                }

            });

            Session::flash('message_sucesso', 'Cadastro alterado com sucesso.');
            return Redirect::to('area-restrita/produto/'.$produto->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro',$erro.'Não foi possível alterar cadastro, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $produto = Produto::where('slug', $id)->first();
            $produto->delete();
            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
}
