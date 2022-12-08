<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = 
    [
        'logradouro','numero','bairro','cep','fk_estado','fk_cidade','complemento','latitude','longitude'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'fk_estado');
    }
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'fk_cidade');
    }
}
