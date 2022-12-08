<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Covidas;
use App\Objetivo;

class CovidasController extends Controller
{
    public function index()
    {
        $covidas = Covidas::first();
        $objetivos = Objetivo::all();
        return view('Site.covidas', compact('covidas', 'objetivos'));
    }
}
