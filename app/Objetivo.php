<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Objetivo extends Model
{
    use HasSlug;
    public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('titulo')
             ->saveSlugsTo('slug');
     }
     public function getRouteKeyName()
      {
        return 'slug';
      }
      
}
