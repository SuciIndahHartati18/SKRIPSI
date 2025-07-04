<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaTes;
use App\Models\NilaiTes;
use App\Models\NormalisasiTes;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NormalisasiTesController extends Controller
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

    public function create(Request $request)
    {
        $siswas         = Siswa::has('nilaiTes')->latest()->get();
        $selectedSiswa  = null;
        $nilaiTes       = collect();
        $kriteriaTes    = KriteriaTes::latest()->get();

        if ($request->has('siswa_id')) {
            $selectedSiswa = Siswa::find($request->siswa_id);

            if ($selectedSiswa) {
                $nilaiTes = NilaiTes::where('siswa_id', $selectedSiswa->id)
                    ->with('kriteriaTes')->get()->keyBy('kriteria_tes_id');
            }
        }

        return view('admin.normalisasi_Tes.create', [
            'siswas'                => $siswas,
            'selectedSiswa'         => $selectedSiswa,
            'nilaiTes'         => $nilaiTes,
            'kriteriaTes'      => $kriteriaTes,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id'                  => ['required', 'exists:siswa,id'],
            'nilai_normalisasi_tes'     => ['required', 'array'],
            'nilai_normalisasi_tes.*'   => ['nullable', 'numeric'],
        ]);

        $siswaId = $validatedData['siswa_id'];

        // Cek apakah siswa dengan nama dan tahun ajaran sudah dimasukkan ke normalisasi
        $siswa          = Siswa::findOrFail($siswaId);
        $alreadyExists  = NormalisasiTes::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama_siswa', $siswa->nama_siswa)
                ->where('tahun_ajaran', $siswa->tahun_ajaran);
        })->exists();

        if ($alreadyExists) {
            return redirect()->back()
                ->withErrors(['siswa_id' => 'Normalisasi untuk siswa dengan Nama dan Tahun Ajaran ini sudah dimasukkan!'])
                ->withInput();
        }

        DB::beginTransaction();
        try {
            foreach ($validatedData['nilai_normalisasi_tes'] as $kriteriaId => $nilaiSiswa) {
                if ($nilaiSiswa === null) continue;

                $maxNilai = NilaiTes::where('kriteria_tes_id', $kriteriaId)->max('nilai_tes');

                if ($maxNilai == 0) {
                    $normalisasi = 0;
                } else {
                    $normalisasi = $nilaiSiswa / $maxNilai;
                }

                NormalisasiTes::updateOrCreate([
                    'siswa_id'          => $siswaId,
                    'kriteria_tes_id'   => $kriteriaId,
                ], [
                    'nilai_normalisasi_tes' => $normalisasi,
                ]);
            }
            
            DB::commit();
            return redirect()->route('admin.perhitungan_jalur_tes.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.perhitungan_jalur_tes.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NormalisasiTes  $normalisasiTes
     * @return \Illuminate\Http\Response
     */
    public function show(NormalisasiTes $normalisasiTes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NormalisasiTes  $normalisasiTes
     * @return \Illuminate\Http\Response
     */
    public function edit(NormalisasiTes $normalisasiTes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NormalisasiTes  $normalisasiTes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NormalisasiTes $normalisasiTes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NormalisasiTes  $normalisasiTes
     * @return \Illuminate\Http\Response
     */
    public function destroy(NormalisasiTes $normalisasiTes)
    {
        //
    }
}
