<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Servico;

class ServicoController extends Controller
{
    public function index()
    {
        $servico = Servico::first();
        
        return view('Site.servico', compact('servico'));
    }
}
