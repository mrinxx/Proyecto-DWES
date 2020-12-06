<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //En estas líneas especifico que factory quiero utilizar y cuantos datos
        //de cada tipo quiero introducir en la BD
        \App\Models\User::factory(10)->create();
        \App\Models\Imagen::factory(20)->create();
        \App\Models\Comentario::factory(30)->create();
        \App\Models\Like::factory(60)->create();
    }
}
