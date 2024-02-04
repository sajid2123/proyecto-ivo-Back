<?php

namespace Database\Factories;
use App\Models\Prueba;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prueba>
 */
class PruebaFactory extends Factory
{
    protected $model = Prueba::class;

    public function definition(): array
    {
        return [
            'informe' => $this->faker->text(255),
            'imagen' => $this->faker->imageUrl(),
            'fecha' => $this->faker->date(),
            'id_usuario_radiologo' => function () {
                return \App\Models\Radiologo::factory()->create()->id_usuario_radiologo;
            },
            'id_usuario_paciente' => function () {
                return \App\Models\Paciente::factory()->create()->id_usuario_paciente;
            },
            'id_usuario_medico' => function () {
                return \App\Models\Medico::factory()->create()->id_usuario_medico;
            }
        ];
    }
}
