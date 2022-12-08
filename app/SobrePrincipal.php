<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;
use Illuminate\Database\Eloquent\Model;

class SobrePrincipal extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = 
    [
        'titulo','conteudo'
    ]; 
   
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagem_sobre_principal_01');
        $this->addMediaCollection('imagem_sobre_principal_02');
    }
}

