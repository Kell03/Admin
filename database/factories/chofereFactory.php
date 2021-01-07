<?php

namespace Database\Factories;

use App\Models\chofere;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class chofereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = chofere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'names' => $this->faker->names,
            'apellido' => $this->faker->apellido,
            'cedula' => $this->faker->cedula,
            'chuto' => $this->faker->chuto,
            'placa' => $this->faker->placa,
            'tlf' => $this->faker->tlf,
            
        ];
    }
}
