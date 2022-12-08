<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;
use Illuminate\Database\Eloquent\Model;

class SobreSecundario extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = 
    [
        'titulo','conteudo'
    ]; 
   
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagem_sobre_secundario_01');
        $this->addMediaCollection('imagem_sobre_secundario_02');
        $this->addMediaCollection('video_sobre_secundario');
    }
}
