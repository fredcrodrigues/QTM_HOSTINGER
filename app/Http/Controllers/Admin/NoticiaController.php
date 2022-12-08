<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RequestNoticia;
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

use App\Noticia;

class NoticiaController extends Controller
{
    public function index()
    {
        return view('Admin.Noticia.index');
    }

    public function create()
    {
        return view('Admin.Noticia.create');
    }
    public function edit(Noticia $slug)
    {
        $modelo = Noticia::where('id', $slug->id)->first();
        return view('Admin.Noticia.edit', compact('modelo'));
    }

    public function list()
    {
       $modelo = Noticia::all();
        return Datatables::of($modelo)
        ->editColumn('titulo', function ($modelo) {
            return $modelo->titulo;
        })
        ->editColumn('acao', function ($modelo) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/noticias/'.$modelo->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$modelo->slug.'">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>';
        })
        ->editColumn('data', function ($modelo) {
            return  date('d/m/Y', strtotime($modelo->data));
            
        })
        ->editColumn('criado', function ($modelo) {
            return  $modelo->data;
            
        })->escapeColumns([0])
        ->make(true);
    }


    public function store(RequestNoticia $request)
    {
        try {
            
            $modelo = new Noticia();
            $modelo->data = $request->data;
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
                $imagePath = $request->file('imagem_noticia');
                $modelo->addMedia($imagePath)->toMediaCollection('noticia','imagem_noticia');
            });

            Session::flash('message_sucesso', 'Notícia Cadastrada!');
            return Redirect::to('/area-restrita/noticias/'.$modelo->slug.'/edit');
        } catch (\Exception  $erro) {
            Session::flash('message_erro', $erro.'Não foi possível cadastrar Notícia, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function update(RequestNoticia $request,$id)
    {
        try {
            $modelo = Noticia::find($id);
            $modelo->data = $request->data;
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo,$request) {
                $modelo->save();
                if($request->imagem_noticia !="" && $modelo->getFirstMedia('noticia')->file_name != $request->imagem_noticia){
                    $modelo->clearMediaCollection('noticia');
                    $imagePath = $request->file('imagem_noticia');
                    $modelo->addMedia($imagePath)->toMediaCollection('noticia','imagem_noticia');
                }
            });

            Session::flash('message_sucesso', 'Notícia Alterada!');
            return Redirect::to('area-restrita/noticias/'.$modelo->slug.'/edit');
       } catch (\Exception  $erro) {
           Session::flash('message_erro', 'Não foi possível alterar Notícia, tente novamente mais tarde.!');
           return Redirect::to('area-restrita/noticias/'.$modelo->slug.'/edit');
       }
    }

    public function destroy($id)
    {
        try {
            $noticia =  Noticia::where('slug', $id)->first();
            $noticia->delete();
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
