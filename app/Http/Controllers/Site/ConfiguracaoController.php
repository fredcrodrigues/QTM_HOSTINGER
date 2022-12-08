<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Configuracao;

class ConfiguracaoController extends Controller
{
    public function termos()
    {
        return view('Site.termos');
        
    }
    public function politica_privacidade()
    {
        return view('Site.politica_privacidade');
        
    }
    public function uso_responsavel()
    {
        return view('Site.uso_responsavel');
        
    }
}
