<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnaRolUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Del esquema coge la tabla usuarios y en el campo rol le doy un dato entre
        //user, manager o admin. Por defecto será user
        Schema::table('usuarios',function (Blueprint $table){
            $table->enum('rol',['user','manager','admin'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
