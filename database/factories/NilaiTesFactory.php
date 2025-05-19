<?php

namespace Database\Factories;

use App\Models\KriteriaTes;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiTes>
 */
class NilaiTesFactory extends Factory
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
            'kriteria_tes_id' => KriteriaTes::factory(),
            'nilai_tes' => fake()->numberBetween(100, 1200),
        ];
    }
}
