<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;

class Configuracao extends Model implements HasMedia
{
    
    use HasMediaTrait;
    protected $fillable = ['instagram','youtube', 'facebook', 'whatsapp', 'email', 'link_app_store', 'link_google_play'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagem_logomarca');
    }
}
