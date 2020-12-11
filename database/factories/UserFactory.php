<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() 
    {
        return [
            'rol'=> $this->faker->randomElement(['admin','user']),
            'nombre' => $this->faker->name,
            'apellido'=>$this->faker->lastName,
            'nombre_usuario'=>$this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' =>  Hash::make('1234'), // password
            'imagen'=>$this->faker->imageUrl(50,50),
            'email_verified_at' => now(),
            'created_at'=>$this->faker->dateTime(),
            'updated_at'=>$this->faker->dateTime(),
            'remember_token' => Str::random(10),
        ];
    }
}
