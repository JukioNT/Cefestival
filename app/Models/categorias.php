<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function apresentacoes(){
        return $this->hasMany('App/Models/apresentacoes', 'categoria_id');
    }
}
