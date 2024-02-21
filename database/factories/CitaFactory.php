<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    
    protected $model = Cita::class;


    public function definition()
    {
        return [
            'sip' => $this->faker->randomNumber(),
            'hora' => $this->faker->dateTime(),
            'servicio' => $this->faker->sentence(),
            'id_usuario_medico' => function () {
                return \App\Models\Medico::factory()->create()->id_usuario_medico;
            },
            'id_usuario_administrativo' => function () {
                return \App\Models\Administrativo::factory()->create()->id_usuario_administrativo;
            },
            'id_usuario_paciente' => function () {
                return \App\Models\Paciente::factory()->create()->id_usuario_paciente;
            },
            'id_usuario_radiologo' => function () {
                return \App\Models\Radiologo::factory()->create()->id_usuario_radiologo;
            },
        ];
    }
}
