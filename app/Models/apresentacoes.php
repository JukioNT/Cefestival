<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apresentacoes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function categorias(){
        return $this->belongsTo('App/Models/categorias');
    }
    public function notas(){
        return $this->hasMany('App/Models/notas', 'apresentacoes_id');
    }
}
