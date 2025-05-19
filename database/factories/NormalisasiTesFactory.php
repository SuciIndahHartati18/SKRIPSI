<?php

namespace Database\Factories;

use App\Models\KriteriaTes;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NormalisasiTes>
 */
class NormalisasiTesFactory extends Factory
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
            'nilai_normalisasi_tes' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
