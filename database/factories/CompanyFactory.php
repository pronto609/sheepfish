<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => implode(' ',$this->faker->words(rand(1,5))),
            'email' => $this->faker->email(),
            'logo' => 'logo.png',
            'website' => implode('-',$this->faker->words(rand(1,3))).'.'.Str::lower(Str::random(rand(2,4)))
        ];
    }
}
