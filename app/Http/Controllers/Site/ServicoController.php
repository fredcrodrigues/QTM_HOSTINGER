<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Servico;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        
        return view('Site.servico', compact('servicos'));
    }
}
