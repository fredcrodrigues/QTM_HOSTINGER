<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Banner;
use App\ContatoPaginaInicial;
use App\CovidasPrincipal;
use App\ServicoOferecido;
use App\Slide;
use App\Parceiro;
use App\SobrePrincipal;
use App\SobreSecundario;


class InicioController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $contato = ContatoPaginaInicial::first();
        $servico_oferecido = ServicoOferecido::get();
        $slide = Slide::get();
        $parceiro = Parceiro::get();
        $covidas_principal = CovidasPrincipal::first();
        $sobre_principal = SobrePrincipal::first();
        $sobre_secundario = SobreSecundario::first();
       
        
        return view('Site.index', compact('banner','contato','servico_oferecido','slide','parceiro', 'covidas_principal','sobre_principal','sobre_secundario'));
    }
}
