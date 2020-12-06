<?php

namespace Database\Factories;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imagen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            
            'usuario_id' => \App\Models\User::all()->random()->id,
            'ruta_imagen'=> $this->faker->imageUrl,
            'description' => $this->faker->text(),

        ];
    }
}
