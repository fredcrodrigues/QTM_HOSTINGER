<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = ['id','fk_user_cliente','fk_user','tipo','form','status','created_at'];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'fk_user_cliente');
    }

    public function profissional_local()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
}
