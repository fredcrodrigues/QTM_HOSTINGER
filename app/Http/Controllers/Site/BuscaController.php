<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Conselho;
use App\Especialidade;
use App\Estado;
use App\Endereco;
use GoogleMaps;

class BuscaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Site.escolha');
    }

    public function profissionais()
    {
        $estado = Estado::get();
        $conselho = Conselho::where('status','1')->get();
        $especialidade = Especialidade::where('status','1')->get();
        return view('Site.busca_profissional',compact('estado','conselho','especialidade'));
    }

    public function coworkings()
    {
        $estado = Estado::get();
        
         
        return view('Site.busca_coworking',compact('estado'));
    }

    public function filtro_profissionais(Request $request)
    {
        
        $filtro = $request->filtro;

        if($filtro == "nome"){

            $retorno = User::join('enderecos','enderecos.fk_user','=','users.id')
            ->where("users.tipo","profissional")
            ->where('users.status','ativo')
            ->where('users.nome', 'like', "%$request->nome%")
            ->select("enderecos.latitude",'enderecos.longitude','users.*')->get();

        } else if($filtro == "especialidade"){

            $retorno = User::join('enderecos','enderecos.fk_user','=','users.id')
            ->where("users.tipo","profissional")
            ->where('users.status','ativo')
            ->where('users.especialidade', 'like', "%$request->especialidade%")
            ->select("enderecos.latitude",'enderecos.longitude','users.*')->get();
        }
        else if($filtro == "cidade"){
            $retorno = User::join('enderecos','enderecos.fk_user','=','users.id')
            ->where("users.tipo","profissional")
            ->where('users.status','ativo')
            ->where('enderecos.fk_cidade', "$request->cidade")
            ->select("enderecos.latitude",'enderecos.longitude','users.*')->get();
        }
       
        return $retorno;
    }

   

    public function filtro_coworkings(Request $request)
    {
        $filtro = $request->filtro;

        if($filtro == "nome"){

            $retorno = User::join('enderecos','enderecos.fk_user','=','users.id')
            ->where("users.tipo","coworking")
            ->where('users.status','ativo')
            ->where('users.nome', 'like', "%$request->nome%")
            ->select("enderecos.latitude",'enderecos.longitude','users.*')->get();

        }else if($filtro == "cidade"){

            $retorno = User::join('enderecos','enderecos.fk_user','=','users.id')
            ->where("users.tipo","coworking")
            ->where('users.status','ativo')
            ->where('enderecos.fk_cidade',"$request->cidade")
            ->select("enderecos.latitude",'enderecos.longitude','users.*')->get();
        }
           
            return $retorno;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
