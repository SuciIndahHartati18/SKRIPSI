<?php

namespace Database\Factories;

use App\Models\KriteriaPrestasi;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiSiswa>
 */
class NilaiSiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'siswa_id' => Siswa::factory(), // atau gunakan id yang sudah ada
            'kriteria_prestasi_id' => KriteriaPrestasi::factory(), // atau id yang sudah ada
            'nilai' => $this->faker->numberBetween(50, 100),
        ];
    }
}
