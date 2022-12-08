<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RequestBanner;
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

use App\Banner;
use App\Unidade;

class BannerController extends Controller
{
    public function create()
    {
        return view('Admin.Banner.create');
    }
    public function index()
    {
        return view('Admin.Banner.index');
        
    }
    public function edit(Banner $slug)
    {
        $banner = Banner::where('id', $slug->id)->first();
        return view('Admin.Banner.edit', compact('banner'));
    }
   
    public function store(RequestBanner $request)
    {
        try{
            $banner = new Banner();
            $banner->titulo = $request->titulo;
            $banner->link = $request->link;
                
            DB::transaction(function() use ($banner,$request) {
                $banner->save();
                $imagePath = $request->file('imagem_banner');
                $banner->addMedia($imagePath)->toMediaCollection('banner-imagem','imagem_banner'); 
                
            });
            Session::flash('message_sucesso', 'Banner Criado!');
            return Redirect::to('/area-restrita/banner/');
        }
        catch(\Exception  $errors) {
            Session::flash('message_erro', 'Não foi possível criar o banner, tente novamente mais tarde.!');
            return back()->withInput();
        }
        
    }
    

    public function update(RequestBanner $request,$id)
    {
        try{
            $banner =  Banner::find($id);
            $banner->titulo = $request->titulo;
            $banner->link = $request->link;
            
           DB::transaction(function() use ($banner,$request) {
                $banner->save();

                if($banner->getFirstMedia('banner-imagem') == null){
                    $imagePath = $request->file('imagem_banner');
                    $banner->addMedia($imagePath)->toMediaCollection('banner-imagem','imagem_banner');
                } else if($request->imagem_banner != "" && $banner->getFirstMedia('banner-imagem')->file_name != $request->imagem_banner){
                    $banner->clearMediaCollection('banner-imagem');
                    $imagePath = $request->file('imagem_banner');
                    $banner->addMedia($imagePath)->toMediaCollection('banner-imagem','imagem_banner');
                }


            });

            Session::flash('message_sucesso', 'Banner Alterado!');
            return Redirect::to('area-restrita/banner/'.$banner->slug.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message_erro', 'Não foi possível alterar banner, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
    public function show()
    {
        $banners = Banner::all();
        return Datatables::of($banners)
        ->editColumn('titulo', function ($banners) {
            return  $banners->titulo;
        })
        ->editColumn('link', function ($banners) {
            return  $banners->link;
        })
        ->editColumn('acao', function ($banners) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/banner/'.$banners->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$banners->slug.'">
                            <i class="fas fa-trash"></i>
                        </a>
                        
                    </div>';
        })
        ->editColumn('criado', function ($banners) {
            return  $banners->created_at;
            
        })->escapeColumns([0])
        ->make(true);
    }

    public function destroy($id)
    {
        try {
            $banner =  Banner::where('slug',$id)->first();
            $banner->delete();
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
