<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model implements HasMedia{ 

    use HasSlug;
    use HasMediaTrait;

    protected $fillable = ['titulo','data','slug','conteudo'];

        //toda vez que eu criar um titulo ele irá gerar um slug automáticamente.
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
        public function registerMediaCollections(): void {
            $this->addMediaCollection('noticia');
        }
}
