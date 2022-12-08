<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Time extends Model implements HasMedia
{
    use HasSlug;
    use HasMediaTrait;
    protected $fillable = 
    [
        'nome','cargo','conteudo'
    ]; 
    public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('nome')
             ->saveSlugsTo('slug');
     }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagem_time');
    }
}

