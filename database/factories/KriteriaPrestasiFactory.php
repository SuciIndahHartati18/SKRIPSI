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
            'siswa_id' => Siswa::factory(),
            'nama_kriteria_prestasi' => fake()->randomElement(['akademik', 'non akademik']),
            'tipe_kriteria_prestasi' => fake()->randomElement(['Ada', 'Tidak ada']),
            'bobot_kriteria_prestasi' => fake()->randomFloat(2, 0, 1000),
        ];
    }
}
