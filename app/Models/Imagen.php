<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
   protected $fillable=['ruta_imagen','description'];

    //Una imagen -> muchos comentarios
    public function comentarios(){
        return $this->hasMany('App\Models\Comentario');
    }

    //Una imagen -> muchos likes
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    //Una imagen -> un solo usuario
    public function usuario(){
        return $this->belongsTo('App\Models\User','usuario_id');
    }
}
