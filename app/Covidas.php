<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Covidas extends Model implements HasMedia
{
    use HasSlug;
    use HasMediaTrait;

   
    public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('id')
             ->saveSlugsTo('slug');
     }
     public function getRouteKeyName()
      {
          return 'slug';
      }
      public function registerMediaCollections(): void
      {
        $this->addMediaCollection('imagem_covidas');
      }
}
