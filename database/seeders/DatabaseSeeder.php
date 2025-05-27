<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KriteriaPrestasi;
use App\Models\KriteriaTes;
use App\Models\NormalisasiTes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        KriteriaPrestasi::factory()->create([
            'nama_kriteria_prestasi'    => 'Matematika',
            'tipe_kriteria_prestasi'    => 'benefit',
            'bobot_kriteria_prestasi'   => '0.3',

            'nama_kriteria_prestasi'    => 'Bahasa Indonesia',
            'tipe_kriteria_prestasi'    => 'benefit',
            'bobot_kriteria_prestasi'   => '0.2',

            'nama_kriteria_prestasi'    => 'Ilmu Pengetahuan Alam',
            'tipe_kriteria_prestasi'    => 'benefit',
            'bobot_kriteria_prestasi'   => '0.15',
        ]);

        // Buat 5 kriteria
        // $kriterias = KriteriaTes::factory()->count(5)->create();

        // NormalisasiTes::factory()->count(3)->create()->each(function ($normalisasi) use ($kriterias) {
        //     $normalisasi->kriteriaTes()->attach(
        //         $kriterias->random(rand(2, 4))->pluck('id')->toArray()
        //     );
        // });
    }
}
