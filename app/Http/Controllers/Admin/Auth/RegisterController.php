<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use DB;
use App\User;


use Session;
use Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // if($data['tipo']=="física"){
        //     $rules = array(
        //         'nome' => ['required', 'string', 'max:255'],
        //         'sexo' => ['required','string', 'max:9'],
        //         'nascimento' => ['required','string', 'max:10'],
        //         'telefone' => ['required','string', 'max:14'],
        //         'cpf_cnpj' => ['required','cpf','formato_cpf','unique:users','max:14'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'string', 'min:8', 'confirmed'],
        //         'terms' => 'required',
        //     );

        //     $attributeNames = array(
        //         'nome' => 'Nome',
        //         'sexo' => 'Sexo',
        //         'nascimento' => 'Data de Nascimento',
        //         'telefone' => 'Telefone',
        //         'cpf_cnpj' => 'CPF',
        //         'email' => 'E-mail',
        //         'password' => 'Senha',
        //         'terms' => 'Termos de Uso',
        //     );

        //     $validator = Validator::make($data,$rules);
        //     $validator->setAttributeNames($attributeNames);
    
        // }  else if($data['tipo']=="jurídica"){
        //     $rules = array(
        //         'nome' => ['required', 'string', 'max:255'],
        //         'telefone' => ['required','max:14'],
        //         'cpf_cnpj' => ['required','cnpj','formato_cnpj','unique:users','max:18'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'string', 'min:8', 'confirmed'],
        //         'terms' => 'required',
        //     );

        //     $attributeNames = array(
        //         'nome' => 'Razão Social',
        //         'telefone' => 'Telefone',
        //         'cpf_cnpj' => 'CNPJ',
        //         'email' => 'E-mail',
        //         'password' => 'Senha',
        //         'terms' => 'Termos de Uso',
        //     );

        //     $validator = Validator::make($data,$rules);
        //     $validator->setAttributeNames($attributeNames);
           
        // } 
        // return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        // if(!empty($data['novidade'])){
        //     $novidade = 'true';
        // }else{
        //     $novidade='false';
        // }

        // if($data['tipo'] == 'física'){
        //         $user =  new User();
        //         $user->nome = $data['nome'];
        //         $user->tipo = 'PF';
        //         $user->sexo = $data['sexo'];
        //         $user->nascimento = $data['nascimento'];
        //         $user->telefone = $data['telefone'];
        //         $user->cpf_cnpj = $data['cpf_cnpj'];
        //         $user->email = $data['email'];
        //         $user->novidade = $novidade;
        //         $user->password = bcrypt($data['password']);
                    
        //         DB::transaction(function() use ($user) {
        //             $user->save();
        //             $user->assignRole('cliente');
        //         });

        //         return $user;

        // } else  if($data['tipo'] == 'jurídica'){
        //         $user =  new User();
        //         $user->nome = $data['nome'];
        //         $user->tipo = 'PJ';
        //         $user->telefone = $data['telefone'];
        //         $user->cpf_cnpj = $data['cpf_cnpj'];
        //         $user->email = $data['email'];
        //         $user->novidade = $novidade;
        //         $user->password = bcrypt($data['password']);
                    
        //         DB::transaction(function() use ($user) {
        //             $user->save();
        //             $user->assignRole('cliente');
        //         });

        //         return $user;
        // }
    }
}
