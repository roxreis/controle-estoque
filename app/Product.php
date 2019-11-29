<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //case nao use o padrao laravel para tabelas tem que configurar assim:
    //public $tablenome = nome da tabela
    //public $primarykey = nome da primary
    //public $timestemp

    public function users(){
        return $this->belongTo('App\Users');//esta sitaxe é para qdo usamos padrão laravel
    }

}
