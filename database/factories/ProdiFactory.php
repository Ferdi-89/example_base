<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodi>
 */
class ProdiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenjang = fake()->randomElement(['D2', 'D3', 'D4', 'S1', 'S2', 'S3']);

        $namaProdiPool = [
            'Teknik Informatika',
            'Sistem Informasi',
            'Manajemen Informatika',
            'Teknik Komputer',
            'Rekayasa Perangkat Lunak',
            'Ilmu Komputer',
            'Komputerisasi Akuntansi',
            'Teknik Telekomunikasi',
            'Animasi',
            'Desain Komunikasi Visual',
        ];

        return [
            'nama_prodi'    => fake()->unique()->randomElement($namaProdiPool),
            'jenjang_studi' => $jenjang,
            'keterangan'    => fake()->sentence(10),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
