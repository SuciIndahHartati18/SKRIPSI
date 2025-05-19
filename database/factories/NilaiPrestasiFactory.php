<?php

namespace Database\Factories;

use App\Models\KriteriaPrestasi;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiPrestasi>
 */
class NilaiPrestasiFactory extends Factory
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
            'kriteria_prestasi_id' => KriteriaPrestasi::factory(),
            'nilai_prestasi' => fake()->numberBetween(100, 1200),
        ];
    }
}
