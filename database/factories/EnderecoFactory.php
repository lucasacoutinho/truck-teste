<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    public function definition()
    {
        return [
            'logradouro' => $this->faker->streetName(),
            'numero'     => $this->faker->randomNumber(1,999),
            'bairro'     => $this->faker->words(2, true),
            'cidade_id'  => Cidade::inRandomOrder()->first()->id,
        ];
    }
}
