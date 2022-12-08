<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestTime;
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

use App\Time;

class TimeController extends Controller
{
    public function create()
    {
        return view('Admin.Time.create');
    }
    public function index()
    {
        return view('Admin.Time.index');
        
    }
    public function edit(Time $slug)
    {
        $time = Time::where('id', $slug->id)->first();
        return view('Admin.Time.edit', compact('time'));
    }
   
    public function store(RequestTime $request)
    {
        try{
            $time = new Time();
            $time->nome = $request->nome;
            $time->cargo = $request->cargo;
            $time->conteudo = $request->conteudo;
                
            DB::transaction(function() use ($time,$request) {
                $time->save();
                $imagePath = $request->file('imagem_time');
                $time->addMedia($imagePath)->toMediaCollection('time-imagem','imagem_time'); 
                
            });
            Session::flash('message_sucesso', 'Cadastro realizado com sucesso.');
            return Redirect::to('area-restrita/time-qtm/'.$time->slug.'/edit');
        }
        catch(\Exception  $errors) {
            Session::flash('message_erro', 'Não foi possível criar o cadastro, tente novamente mais tarde.!');
            return back()->withInput();
        }
        
    }
    

    public function update(RequestTime $request,$id)
    {
        try{
            $time =  Time::find($id);
            $time->nome = $request->nome;
            $time->cargo = $request->cargo;
            $time->conteudo = $request->conteudo;
            
           DB::transaction(function() use ($time,$request) {
                $time->save();

                if($time->getFirstMedia('time-imagem') == null){
                    $imagePath = $request->file('imagem_time');
                    $time->addMedia($imagePath)->toMediaCollection('time-imagem','imagem_time');
                } else if($request->imagem_time != "" && $time->getFirstMedia('time-imagem')->file_name != $request->imagem_time){
                    
                    $time->clearMediaCollection('time-imagem');
                    $imagePath = $request->file('imagem_time');
                    $time->addMedia($imagePath)->toMediaCollection('time-imagem','imagem_time');
                }
            });

            Session::flash('message_sucesso', 'Cadastro alterado com sucesso.');
            return Redirect::to('area-restrita/time-qtm/'.$time->slug.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message_erro', 'Não foi possível alterar cadastro, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
    public function show()
    {
        $times = Time::all();
        return Datatables::of($times)
        ->editColumn('nome', function ($times) {
            return  $times->nome;
        })
        ->editColumn('cargo', function ($times) {
            return  $times->cargo;
        })
        ->editColumn('acao', function ($times) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/time-qtm/'.$times->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btnExcluir"
                            title="Excluir" data-toggle="tooltip"
                            data-id="'.$times->slug.'">
                            <i class="fas fa-trash"></i>
                        </a>
                        
                    </div>';
        })
        ->editColumn('criado', function ($times) {
            return  $times->created_at;
            
        })->escapeColumns([0])
        ->make(true);
    }

    public function destroy($id)
    {
        try {
            $time =  Time::where('slug',$id)->first();
            $time->delete();
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }   //
}
