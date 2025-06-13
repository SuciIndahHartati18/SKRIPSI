<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaTes;
use App\Models\NilaiTes;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiTesController extends Controller
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

    public function create()
    {
        $siswas     = Siswa::latest()->get();
        $kriteriaTes= KriteriaTes::all();

        return view('admin.nilai_tes.create', [
            'siswas'        => $siswas,
            'kriteriaTes'   => $kriteriaTes
        ]);
    }

    public function store(Request $request)
    {
        $valiadatedData = $request->validate([
            'siswa_id'          => ['required', 'exists:siswa,id'],
            'kriteria_tes_id'   => ['required', 'array'],
            'kriteria_tes_id.*' => ['required', 'exists:kriteria_tes,id'],
            'nilai_tes'         => ['required', 'array'],
            'nilai_tes.*'       => ['required', 'numeric', 'between:0,100'],
        ]);

        // Cek apakah siswa sudah pernah dimasukkan
        $siswa          = Siswa::findOrFail($valiadatedData['siswa_id']);
        $alreadyExists  = NilaiTes::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama_siswa', $siswa->nama_siswa)
                ->where('tahun_ajaran', $siswa->tahun_ajaran);
        })->exists();

        if ($alreadyExists) {
            return redirect()->back()
                ->withErrors(['siswa_id' => 'Nilai tes untuk siswa dengan Nama dan Tahun Ajaran ini sudah dimasukkan!'])
                ->withInput();
        }

        foreach ($valiadatedData['kriteria_tes_id'] as $index => $kriteriaId) {
            $kriteria   = KriteriaTes::find($kriteriaId);
            $nilaiAsli  = $valiadatedData['nilai_tes'][$index];

            // Konversi nilai
            $nilaiKonversi = $this->rantingKecocokan($kriteria->nama_kriteria_tes, $nilaiAsli);

            NilaiTes::create([
                'siswa_id'          => $valiadatedData['siswa_id'],
                'kriteria_tes_id'   => $kriteriaId,
                'nilai_tes'         => $nilaiKonversi,
            ]);
        }

        return redirect()->route('admin.perhitungan_jalur_tes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiTes  $nilaiTes
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiTes $nilaiTes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiTes  $nilaiTes
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiTes $nilaiTes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiTes  $nilaiTes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiTes $nilaiTes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiTes  $nilaiTes
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiTes $nilaiTes)
    {
        //
    }

    private function rantingKecocokan($kriteriaNama, $nilaiAsli)
    {
        if ($kriteriaNama === 'Mengaji') {
            if ($nilaiAsli <= 70) return 2;
            elseif ($nilaiAsli <= 80) return 3;
            elseif ($nilaiAsli <= 90) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Wawancara') {
            if ($nilaiAsli <= 60) return 2;
            elseif ($nilaiAsli <= 75) return 3;
            elseif ($nilaiAsli <= 85) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Psikotes') {
            if ($nilaiAsli <= 65) return 2;
            elseif ($nilaiAsli <= 75) return 3;
            elseif ($nilaiAsli <= 85) return 4;
            else return 5;
        }

        return $nilaiAsli;
    }
}
