<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tareas;

class TareasFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' =>fake()->word(),
            'descripcion' =>fake()->text(),
            'estado' =>fake()->randomElement(),
            'fecha_inicio' =>fake()->dateTime(),
            'fecha_fin' =>fake()->dateTime(),
            'proyecto_id' =>fake()->numberBetween(0,12),
            'usuario_id' =>fake()->randomNumber(5),
        ];
    }
}

