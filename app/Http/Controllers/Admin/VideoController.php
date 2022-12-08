<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestVideo;
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

use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Admin.Video.index');
    }

    public function create()
    {
        return view ('Admin.Video.create');
    }

    public function edit(Video $slug)
    {

        $video = Video::where('id', $slug->id)->first();
        return view ('Admin.Video.edit', compact('video'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestVideo $request)
    {
        try{
            $video = new Video();
            $video->titulo = $request->titulo;
            $video->descricao = $request->descricao;
            $video->video = $request->video;
            
            DB::transaction(function() use ($video,$request) {
                $video->save();
                $imagePath = $request->file('imagem_video');
                $video->addMedia($imagePath)->toMediaCollection('video-imagem','imagem_video'); 
                
            });

            Session::flash('message_sucesso', 'Video Criado!');
            return Redirect::to('area-restrita/videos/');

        }catch(\Exception  $erro){
            Session::flash('message_erro',$erro.'Não foi possível adicionar o Video, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $videos = Video::all();
        return Datatables::of($videos)
        ->editColumn('titulo', function ($videos) {
            return  '<span >'.$videos->titulo.'</span>';
        })
        ->editColumn('link', function ($videos) {
            return  '<span >'.$videos->video.'</span>';
        })
        ->editColumn('acao', function ($videos) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/videos/'.$videos->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$videos->slug.'">
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

    public function update(RequestVideo $request, $id)
    {
        try{
           
            $video = Video::find($id);
            $video->titulo = $request->titulo;
            $video->descricao = $request->descricao;
            $video->video = $request->video;
            
            DB::transaction(function() use ($video,$request) {
                $video->save();
                if($request->imagem_video != "" && $video->getFirstMedia('video-imagem')->file_name != $request->imagem_video){
                    
                    $video->clearMediaCollection('video-imagem');
                    $imagePath = $request->file('imagem_video');
                    $video->addMedia($imagePath)->toMediaCollection('video-imagem','imagem_video');
                }
            });
            Session::flash('message_sucesso', 'Video Alterado!');
            return Redirect::to('area-restrita/videos/'.$video->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro',$erro.'Não foi possível alterar o Video, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $video = Video::where('slug', $id)->first();
            $video->delete();
            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
    

}
