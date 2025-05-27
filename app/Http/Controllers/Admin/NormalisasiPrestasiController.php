<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaPrestasi;
use App\Models\NilaiPrestasi;
use App\Models\NormalisasiPrestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NormalisasiPrestasiController extends Controller
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
        $siswas             = Siswa::has('nilaiPrestasi')->latest()->get();
        $selectedSiswa      = null;
        $nilaiPrestasi      = collect();
        $kriteriaPrestasi   = KriteriaPrestasi::latest()->get();

        if ($request->has('siswa_id')) {
            $selectedSiswa = Siswa::find($request->siswa_id);

            if ($selectedSiswa) {
                $nilaiPrestasi = NilaiPrestasi::with('kriteriaPrestasi')
                    ->where('siswa_id', $selectedSiswa->id)->get()->keyBy('kriteria_prestasi_id');
            }
        }

        return view('admin.normalisasi_prestasi.create', [
            'siswas'                => $siswas,
            'selectedSiswa'         => $selectedSiswa,
            'nilaiPrestasi'         => $nilaiPrestasi,
            'kriteriaPrestasi'      => $kriteriaPrestasi,
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
            'siswa_id'                      => ['required', 'exists:siswa,id'],
            'nilai_normalisasi_prestasi'    => ['required', 'array'],
            'nilai_normalisasi_prestasi.*'  => ['nullable', 'numeric'],
        ]);

        $siswaId = $validatedData['siswa_id'];

        DB::beginTransaction();
        try {
            foreach ($validatedData['nilai_normalisasi_prestasi'] as $kriteriaId => $nilaiSiswa) {
                if ($nilaiSiswa === null) continue;

                $maxNilai = NilaiPrestasi::where('kriteria_prestasi_id', $kriteriaId)->max('nilai_prestasi');

                if ($maxNilai == 0) {
                    $normalisasi = 0;
                } else {
                    $normalisasi = $nilaiSiswa / $maxNilai;
                }

                NormalisasiPrestasi::updateOrCreate([
                    'siswa_id'              => $siswaId,
                    'kriteria_prestasi_id'  => $kriteriaId,
                ], [
                    'nilai_normalisasi_prestasi' => $normalisasi,
                ]);
            }
            
            DB::commit();
            return redirect()->route('admin.perhitungan_jalur_prestasi.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.perhitungan_jalur_prestasi.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NormalisasiPrestasi  $normalisasiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(NormalisasiPrestasi $normalisasiPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NormalisasiPrestasi  $normalisasiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(NormalisasiPrestasi $normalisasiPrestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NormalisasiPrestasi  $normalisasiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NormalisasiPrestasi $normalisasiPrestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NormalisasiPrestasi  $normalisasiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(NormalisasiPrestasi $normalisasiPrestasi)
    {
        //
    }
}
