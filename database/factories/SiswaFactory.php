<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nisn' => fake()->numberBetween(100, 1200),
            'nama_siswa' => fake()->name(),
            'alamat' => fake()->address(),
            'jalur' => fake()->randomElement(['Prestasi', 'Tes']),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
        ];
    }
}
