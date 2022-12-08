<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mail\SendMailLiberacaoPlataforma;

use Illuminate\Support\Facades\Mail;

use Response;
use DB;
use Session;
use Redirect;
use Auth;

use GoogleMaps;

use App\User;
use App\Endereco;

class LiberacaoController extends Controller
{

    public function edit(User $slug)
    {
        $modelo = User::where('id', $slug->id)->first();
        return view('Admin.Liberacao.edit', compact('modelo'));
    }

    public function update(Request $request,$id)
    {
            try {
                $modelo = User::find($id);
                $modelo->status = "ativo";

                $endereco = Endereco::where('fk_user',$id)->first();
                $endereco->latitude = $request->latitude;
                $endereco->longitude = $request->longitude;
                
                DB::transaction(function () use ($modelo,$endereco) {
                    $modelo->save();
                    $endereco->save();

                    Mail::to($modelo->email)->send(new SendMailLiberacaoPlataforma($modelo->nome));
                });

                Session::flash('message_sucesso', 'Liberação realizada com sucesso.');
                return Redirect::to('area-restrita/liberacao/'.$modelo->slug.'/edit');
           } catch (\Exception  $erro) {
               Session::flash('message_erro',$erro. 'Não foi possível realizar liberação, tente novamente mais tarde.!');
               return Redirect::to('area-restrita/liberacao/'.$modelo->slug.'/edit');
           }
    }

    public function gerar_localizacao(Request $request)
    {
        $profissional = User::where('id',$request->id)->first();
        $response = GoogleMaps::load('geocoding')
        ->setParam (['address'=>$profissional->endereco->logradouro.",".$profissional->endereco->cep.",".$profissional->endereco->cidade->nome.",".$profissional->endereco->estado->nome.""])
        ->get();
        
        return $response;
    }
}
