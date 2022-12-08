<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SobreConteudo;
use App\Time;

class SobreController extends Controller
{
    public function index()
    {
        $sobre_conteudo = SobreConteudo::first();
        $time = Time::get();
        
        return view('Site.sobre', compact('sobre_conteudo','time'));
    }
}
