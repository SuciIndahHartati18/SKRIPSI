<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KriteriaTes>
 */
class KriteriaTesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kriteria_tes' => fake()->randomElement(['Mengaji', 'Wawancara', 'Psikotes']),
            'tipe_kriteria_tes' => fake()->randomElement(['benefit', 'cost']),
            'bobot_kriteria_tes' => fake()->randomFloat(2, 0, 1000),
        ];
    }
}
