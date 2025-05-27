<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiTes;
use App\Models\NormalisasiTes;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HasilSeleksiTesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswas = Siswa::has('normalisasiTes')->latest()->get();

        $selectedSiswa  = null;
        $normalisasiTes = [];

        if ($request->filled('siswa_id')) {
            $selectedSiswa = Siswa::find($request->siswa_id);

            if ($selectedSiswa) {
                $normalisasiTes = NormalisasiTes::with('kriteriaTes')
                    ->where('siswa_id', $selectedSiswa->id)->get();
            }
        }

        return view('admin.hasil_seleksi_tes.create', [
            'siswas'            => $siswas,
            'selectedSiswa'     => $selectedSiswa,
            'normalisasiTes'    => $normalisasiTes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id'          => ['required', 'exists:siswa,id'],
        ]);

        $normalisasiTes = NormalisasiTes::with('kriteriaTes')
            ->where('siswa_id', $request->siswa_id)->get();

        // if ($normalisasiTes->isEmpty()) {
        //     return back()->with('error', 'Normalisasi prestasi untuk siswa ini tidak tersedia!');
        // }

        // Hitung nilai Akhir dengan SAW
        $nilaiAkhir = 0;
        foreach ($normalisasiTes as $normalisasi) {
            $nilai      = $normalisasi->nilai_normalisasi_tes;
            $bobot      = $normalisasi->kriteriaTes->bobot_kriteria_tes;
            $nilaiAkhir += $nilai * $bobot;
        }

        HasilSeleksiTes::updateOrCreate([
            'siswa_id'          => $request->siswa_id,
            'nilai_akhir_tes'   => $nilaiAkhir,
        ]);

        return redirect()->route('admin.perhitungan_jalur_tes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function show(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }
}
