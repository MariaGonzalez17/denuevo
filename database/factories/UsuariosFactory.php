<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuarios;


class UsuariosFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' =>fake()->lastName(),
            'correo_electronico' =>fake()->email(),
        ];
    }
}
