<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestSlide;
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

use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Admin.Slide.index');
    }

    public function create()
    {
        return view ('Admin.Slide.create');
    }

    public function edit(Slide $slug)
    {

        $slide = Slide::where('id', $slug->id)->first();
        return view ('Admin.Slide.edit', compact('slide'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSlide $request)
    {
        try{
            $slide = new Slide();
            $slide->titulo = $request->titulo;
            $slide->conteudo = $request->conteudo;
            $slide->botao = $request->botao;
            $slide->link = $request->link;
            
            DB::transaction(function() use ($slide,$request) {
                $slide->save();
            });

            Session::flash('message_sucesso', 'Slide Criado!');
            return Redirect::to('area-restrita/slide/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível adicionar o Slide, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $slide
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $slides = Slide::all();
        return Datatables::of($slides)
        ->editColumn('titulo', function ($slides) {
            return  $slides->titulo;
        })
        ->editColumn('botao', function ($slides) {
            return  $slides->botao;
        })
        ->editColumn('link', function ($slides) {
            return  $slides->link;
        })
        ->editColumn('acao', function ($slides) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/slide/'.$slides->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$slides->slug.'">
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

    public function update(RequestSlide $request, $id)
    {
        try{
            $slide = Slide::find($id);
            $slide->titulo = $request->titulo;
            $slide->conteudo = $request->conteudo;
            $slide->botao = $request->botao;
            $slide->link = $request->link;
            
            DB::transaction(function() use ($slide,$request) {
                $slide->save();
            });
            Session::flash('message_sucesso', 'Slide Alterado!');
            return Redirect::to('area-restrita/slide/'.$slide->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro',$erro.'Não foi possível alterar o Slide, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $slide = Slide::where('slug', $id)->first();
            $slide->delete();
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
   
}
