<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestConselho;
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

use App\Conselho;

class ConselhoController extends Controller
{
    public function index()
    {
        return view ('Admin.Conselho.index');
    }

    public function create()
    {
        return view ('Admin.Conselho.create');
    }

    public function edit(Conselho $slug)
    {

        $modelo = Conselho::where('id', $slug->id)->first();
        return view ('Admin.Conselho.edit', compact('modelo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestConselho $request)
    {
        try{
            $conselho = new Conselho();
            $conselho->titulo = $request->titulo;
            $conselho->status = $request->status;
            
            DB::transaction(function() use ($conselho) {
                $conselho->save();
            });

            Session::flash('message_sucesso', 'Cadastro realizado com sucesso');
            return Redirect::to('area-restrita/conselho/');

        }catch(\Exception  $erro){
            Session::flash('message_erro','Não foi possível realizar cadastro, tente novamente.!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depoimento  $conselho
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $conselho = Conselho::all();
        return Datatables::of($conselho)
        ->editColumn('titulo', function ($conselho) {
            return  $conselho->titulo;
        })
        ->editColumn('status', function ($conselho) {
            if($conselho->status==1){
                return  "ativo";
            }else{
                return  "inativo";
            }
                        
        })
        ->editColumn('acao', function ($conselho) {
            return '<div class="btn-group btn-group-sm">
                        <a href="/area-restrita/conselho/'.$conselho->slug.'/edit"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function update(RequestConselho $request, $id)
    {
        try{
           
            $conselho = Conselho::find($id);
            $conselho->titulo = $request->titulo;
            $conselho->status = $request->status;
            
            DB::transaction(function() use ($conselho) {
                $conselho->save();
            });

            Session::flash('message_sucesso', 'Cadastro alterado com sucesso.');
            return Redirect::to('area-restrita/conselho/'.$conselho->slug.'/edit');
        }
        catch(\Exception  $erro){
           Session::flash('message_erro','Não foi possível alterar o cadastro, tente novamente!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depoimento  $conselho
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $conselho = Conselho::where('slug', $id)->first();
            $conselho->status = 0;
            $conselho->save();

            return response()->json(array('status' => "OK"));
       } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }
}
