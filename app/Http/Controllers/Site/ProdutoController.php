<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produto;
use App\ProdutoConteudo;

class ProdutoController extends Controller
{
    public function index()
    {
        $produto = Produto::get();
        $produto_conteudo = ProdutoConteudo::first();
        
        return view('Site.produto', compact('produto','produto_conteudo'));
    }
}
