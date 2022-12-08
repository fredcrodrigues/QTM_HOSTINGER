<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\MediaCollections\File;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasRoles;
    use HasSlug;
    use SoftDeletes;
    use HasMediaTrait;

    protected $guard_name = 'web'; // or whatever guard you want to use 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'nome','cpf_cnpj','rg','numero_conselho','slug','telefone','conselho','especialidade','tipo','email','password','status','remember_token', 'user_cpf'
    ]; 


    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'fk_user');
    }
   

     //toda vez que eu criar um nome ele irá gerar um slug automáticamente.
     public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('nome')
             ->saveSlugsTo('slug');
     }

      //estou substituindo o id como identificação padrão para o slug
      public function getRouteKeyName()
      {
          return 'slug';
      }
      

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagem_cliente');
        $this->addMediaCollection('registro');
        $this->addMediaCollection('comprovante_residencia');
        $this->addMediaCollection('licenca_funcionamento');
    }

}