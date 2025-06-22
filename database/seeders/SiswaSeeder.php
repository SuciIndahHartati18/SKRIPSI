<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['721398123', 'Ellie Rice', '2025/2024', 'Raccoon City', 'Perempuan'],
        ])->each(function ($item) {
            Siswa::factory()->create([
                'nisn'          => $item[0],
                'nama_siswa'    => $item[1],
                'tahun_ajaran'  => $item[2],
                'alamat'        => $item[3],
                'jenis_kelamin' => $item[4],
            ]);
        });
    }
}
