<?php

namespace Database\Factories;
use App\Models\Diagnostico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diagnostico>
 */
class DiagnosticoFactory extends Factory
{
    protected $model = Diagnostico::class;

    public function definition(): array
    {
        return [
            'informe' => $this->faker->text(),
            'tratamiento' => $this->faker->text(),
            'fecha_creacion' => $this->faker->date(),
            'id_medico' => function () {
                return \App\Models\Medico::factory()->create()->id_usuario_medico;
            },
            'id_paciente' => function () {
                return \App\Models\Paciente::factory()->create()->id_usuario_paciente;
            },
        ];
    }
}
