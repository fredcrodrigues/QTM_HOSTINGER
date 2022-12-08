<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = 
    [
        'titulo','conteudo', 'botao','link'
    ]; 

    public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('titulo')
             ->saveSlugsTo('slug');
     }

}
