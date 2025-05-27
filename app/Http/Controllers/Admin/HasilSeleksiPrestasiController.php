<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiPrestasi;
use App\Models\NormalisasiPrestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HasilSeleksiPrestasiController extends Controller
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
        $siswas = Siswa::has('normalisasiPrestasi')->latest()->get();

        $selectedSiswa          = null;
        $normalisasiPrestasi    = [];

        if ($request->filled('siswa_id')) {
            $selectedSiswa = Siswa::find($request->siswa_id);

            if ($selectedSiswa) {
                $normalisasiPrestasi = NormalisasiPrestasi::with('kriteriaPrestasi')
                    ->where('siswa_id', $selectedSiswa->id)->get();
            }
        }

        return view('admin.hasil_seleksi_prestasi.create', [
            'siswas'                => $siswas,
            'selectedSiswa'         => $selectedSiswa,
            'normalisasiPrestasi'   => $normalisasiPrestasi,
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

        // $siswaId= $validatedData['siswa_id'];

        $normalisasiPrestasi = NormalisasiPrestasi::with('kriteriaPrestasi')
            ->where('siswa_id', $request->siswa_id)->get();

        // if ($normalisasiPrestasi->isEmpty()) {
        //     return back()->with('error', 'Normalisasi prestasi untuk siswa ini tidak tersedia!');
        // }

        // Hitung nilai Akhir dengan SAW
        $nilaiAkhir = 0;
        foreach ($normalisasiPrestasi as $normalisasi) {
            $nilai      = $normalisasi->nilai_normalisasi_prestasi;
            $bobot      = $normalisasi->kriteriaPrestasi->bobot_kriteria_prestasi;
            $nilaiAkhir += $nilai * $bobot;
        }

        HasilSeleksiPrestasi::updateOrCreate([
            'siswa_id'             => $request->siswa_id,
            'nilai_akhir_prestasi' => $nilaiAkhir,
        ]);
        
        return redirect()->route('admin.hasil_seleksi_prestasi.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }
}
