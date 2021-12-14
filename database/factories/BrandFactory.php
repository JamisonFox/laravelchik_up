<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

                //
                'name' => $this->faker->sentence(3),
                'logo' => $this->faker->sentence(1),
                'description' => $this->faker->sentence(7),
                'status' => $this->faker->boolean,
                'creation_year' => $this->faker->year(),

            ];
    }
}
