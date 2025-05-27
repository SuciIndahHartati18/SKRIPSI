<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KriteriaPrestasi>
 */
class KriteriaPrestasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kriteria_prestasi' => $this->faker->randomElement(['Matematika', 'Bahasa Indonesia', 'IPA', 'IPS', 'Bahasa Inggris']),
            'tipe_kriteria_prestasi' => fake()->randomElement(['Ada', 'Tidak ada']),
            'bobot_kriteria_prestasi' => fake()->randomFloat(2, 0, 1000),
        ];
    }
}
