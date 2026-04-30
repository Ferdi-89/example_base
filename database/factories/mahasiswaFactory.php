<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mahasiswa>
 */
class mahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim'=>fake()->bothify('########'),
            'nama_lengkap'=>fake()->name(),
            'tempat_lahir'=>fake()->city(),
            'tgl_lahir'=>fake()->date(),
            'email'=>fake()->unique()->safeEmail(),
            'prodi'=>fake()->randomElement(['TI','SI','MI']),
            'alamat'=>fake()->address(),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
