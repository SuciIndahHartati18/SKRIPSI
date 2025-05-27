<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaPrestasi;
use App\Models\NilaiSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
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
    public function create()
    {
        $siswaList = Siswa::all();
        $kriteriaList = KriteriaPrestasi::all();

        return view('nilai.create', compact('siswaList', 'kriteriaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric|min:0',
        ]);

        foreach ($request->nilai as $kriteriaId => $nilai) {
            NilaiSiswa::updateOrCreate(
                [
                    'siswa_id' => $request->siswa_id,
                    'kriteria_prestasi_id' => $kriteriaId,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }

        return redirect()->route('nilai.create')->with('success', 'Nilai siswa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiSiswa  $nilaiSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiSiswa $nilaiSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiSiswa  $nilaiSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiSiswa $nilaiSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiSiswa  $nilaiSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiSiswa $nilaiSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiSiswa  $nilaiSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiSiswa $nilaiSiswa)
    {
        //
    }

    public function hitungSAW()
    {
        $kriterias = KriteriaPrestasi::all();
        $siswaList = Siswa::with(['nilaiSiswa.kriteriaPrestasi'])->get();

        $normalisasi = [];

        foreach ($kriterias as $kriteria) {
            $nilaiSemuaSiswa = NilaiSiswa::where('kriteria_prestasi_id', $kriteria->id)->pluck('nilai');

            $max = $nilaiSemuaSiswa->max();
            $min = $nilaiSemuaSiswa->min();

            foreach ($siswaList as $siswa) {
                $nilai = $siswa->nilaiSiswa->firstWhere('kriteria_prestasi_id', $kriteria->id)?->nilai ?? 0;

                if ($kriteria->tipe_kriteria_prestasi == 'benefit') {
                    $normal = $max > 0 ? $nilai / $max : 0;
                } else {
                    $normal = $nilai > 0 ? $min / $nilai : 0;
                }

                $normalisasi[$siswa->id][$kriteria->id] = $normal * $kriteria->bobot_kriteria_prestasi;
            }
        }

        // Hitung skor total
        $hasil = [];
        foreach ($siswaList as $siswa) {
            $total = array_sum($normalisasi[$siswa->id] ?? []);
            $hasil[] = [
                'nama_siswa' => $siswa->nama_siswa,
                'skor' => round($total, 4),
            ];
        }

        usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);

        return view('hasil_saw', compact('hasil'));
    }
}
