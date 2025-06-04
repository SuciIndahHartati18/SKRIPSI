<?php

namespace Database\Seeders;

use App\Models\KriteriaTes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['Mengaji', 'benefit', 0.4],
            ['Wawancara', 'benefit', 0.3],
            ['Psikotes', 'benefit', 0.3],
        ])->each(function ($item) {
            KriteriaTes::factory()->create([
                'nama_kriteria_tes'    => $item[0],
                'tipe_kriteria_tes'    => $item[1],
                'bobot_kriteria_tes'   => $item[2],
            ]);
        });
    }
}
