<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prodi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dosen>
 */
class dosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->numerify('##################'),
            'nama'=> fake()->name(),
            'email'=> fake()->unique()->safeEmail(),
            'no_telp'=> fake()->numerify('08##########'),
            'prodi_id'=> fake()->numberBetween(1,Prodi::count()),
            'alamat'=> fake()->address(),
        ];
    }
}
