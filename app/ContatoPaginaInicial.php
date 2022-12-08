<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoPaginaInicial extends Model
{
    protected $fillable = ['titulo','conteudo','email'];
}
