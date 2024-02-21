<?php

namespace Database\Factories;

use App\Models\Administrativo;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition(): array
    {
        return [
            'id_usuario_administrativo' => function () {
                return Administrativo::factory()->create()->id_usuario_administrativo;
            }
        ];
    }
}
