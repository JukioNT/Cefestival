<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    use HasFactory;
    public function apresentacoes(){
        return $this->belongsTo('App/Models/apresentacoes');
    }
    public function user(){
        return $this->belongsTo('App/Models/User');
    }
}
