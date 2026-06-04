<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class matakuliahFactory extends Factory
{
    protected $model = \App\Models\matakuliah::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_matakuliah' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nama_matakuliah' => $this->faker->sentence(3),
            'semester' => $this->faker->numberBetween(1, 6),
            'jenis_matakuliah' => $this->faker->randomElement(['Teori', 'Praktek']),
            'sks' => $this->faker->numberBetween(1, 4),
            'jam' => $this->faker->numberBetween(1, 3),
            'keterangan' => $this->faker->sentence(5),
        ];
    }
}
