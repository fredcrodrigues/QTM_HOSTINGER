<?php

namespace App;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


use Illuminate\Database\Eloquent\Model;

class Banner extends Model implements HasMedia
{
    use HasSlug;
    use HasMediaTrait;
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
    
    protected $fillable = ['id','titulo'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagem_banner');
    }
}