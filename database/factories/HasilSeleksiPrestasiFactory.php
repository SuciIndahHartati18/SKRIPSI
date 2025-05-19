<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HasilSeleksiPrestasi>
 */
class HasilSeleksiPrestasiFactory extends Factory
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
            'nilai_akhir_prestasi' => fake()->randomFloat(2, 10, 100),
            'status_prestasi' => fake()->randomElement(['Ada', 'Tidak ada']),
        ];
    }
}
