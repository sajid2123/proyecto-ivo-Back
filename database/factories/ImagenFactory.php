<?php

namespace Database\Factories;
use App\Models\Imagen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imagen>
 */
class ImagenFactory extends Factory
{
    protected $model = Imagen::class;

    public function definition(): array
    {
        return [
            'id_prueba' => function () {
                return \App\Models\Prueba::factory()->create()->id_prueba;
            },
            'imagen' => $this->faker->imageUrl(),
        ];
    }
}
