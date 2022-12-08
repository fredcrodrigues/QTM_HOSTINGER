<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestContato;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

use App\Mail\SendMailContato;

use Illuminate\Support\Facades\Mail;

use Response;
use DB;
use Validator;

use App\Contato;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(RequestContato $request)
    {
        $email_envio = env('EMAIL_CONTATO');
       
            try {
                $modelo = new Contato();
                $modelo->nome = $request->nome;
                $modelo->email = $request->email;
                $modelo->assunto = $request->assunto;
                $modelo->mensagem = $request->mensagem;
    
                DB::transaction(function () use ($modelo,$email_envio) {
                    $modelo->save();
                    Mail::to($email_envio)->send(new SendMailContato($modelo));
                });
    
                return "ok";
                    }catch(\Exception  $erro){
                        return $erro."erro";
                }
           
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
