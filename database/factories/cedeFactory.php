<?php

namespace Database\Factories;

use App\Models\cede;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class cedeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = cede::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'names' => $this->faker->names,
            'codigo' => $this->faker->codigo,
            
        ];
    }
}
