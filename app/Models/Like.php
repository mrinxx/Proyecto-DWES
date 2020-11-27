<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    //Especifico la tabla de la BD que va a utilizar este modelo -> Likes
    protected $table = 'likes';

    //Muchos likes -> un usuario
    public function usuario(){
        return $this->belongsTo('App\Models\User', 'id_usuario');
        }

    //Muchos likes -> una imagen
    public function imagen(){
        return $this->belongsTo('App\Models\Imagen','id_imagen');
    }
}

