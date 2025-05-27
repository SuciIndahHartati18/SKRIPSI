<?php

namespace Database\Seeders;

use App\Models\KriteriaPrestasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaPrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['Matematika', 'benefit', 0.3],
            ['Bahasa Indonesia', 'benefit', 0.2],
            ['Ilmu Pengetahuan Alam', 'benefit', 0.15],
            ['Ilmu Pengetahuan Sosial', 'benefit', 0.15],
            ['Pendidikan Agama Islam', 'benefit', 0.1],
            ['Pendidikan Kewarnegaraan', 'benefit', 0.1],
        ])->each(function ($item) {
            KriteriaPrestasi::factory()->create([
                'nama_kriteria_prestasi'    => $item[0],
                'tipe_kriteria_prestasi'    => $item[1],
                'bobot_kriteria_prestasi'   => $item[2],
            ]);
        });
    }
}
