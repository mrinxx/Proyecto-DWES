<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Comentario extends Model
    {
        use HasFactory;
        //Tabla que voy a estar modificando
        protected $table = 'comentarios';
        
        //Relaciónde Muchos a Uno
        public function usuario(){
        return $this->belongsTo('App\Models\User', 'usuario_id');
        }
        //Relaciónde Muchos a Uno
        public function imagen(){
        return $this->belongsTo('App\Models\Imagen', 'imagen_id');
    }
}




