<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    public function curso()
    {
        return $this->belongsToMany('App\Cursos')
        ->withTimestamps();
    }

    public function publica()
    {
        return $this->belongsToMany('App\Publicaciones')
        ->withTimestamps();
    }
}
