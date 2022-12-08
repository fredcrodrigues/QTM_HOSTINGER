<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Especialidade extends Model
{
    use HasSlug;

    protected $fillable = 
    [
        'titulo','slug','status'
    ]; 

     //toda vez que eu criar um nome ele irá gerar um slug automáticamente.
     public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('titulo')
             ->saveSlugsTo('slug');
     }

      //estou substituindo o id como identificação padrão para o slug
      public function getRouteKeyName()
      {
          return 'slug';
      }
}
