<?php

namespace Database\Factories;

use App\Models\gandola;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class gandolaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = gandola::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'propietario' => $this->faker->propietario,
            'marca' => $this->faker->marca,
            'modelo' => $this->faker->modelo,
            'placa' => $this->faker->placa,
            'descripcion' => $this->faker->descripcion,
            'estado' => $this->faker->estado,
            
        ];
    }
}
