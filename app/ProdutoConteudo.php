<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoConteudo extends Model
{
    protected $fillable = 
    [
        'titulo', 'conteudo'
    ]; 
}
