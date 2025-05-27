<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaPrestasi;
use App\Models\NilaiPrestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiPrestasiController extends Controller
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
        $siswas = Siswa::latest()->get();
        $kriteriaPrestasi   = KriteriaPrestasi::all();

        return view('admin.nilai_prestasi.create', [
            'siswas'            => $siswas,
            'kriteriaPrestasi'   => $kriteriaPrestasi,
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
        $valiadatedData = $request->validate([
            'siswa_id'              => ['required', 'exists:siswa,id'],
            'kriteria_prestasi_id'  => ['required', 'array'],
            'kriteria_prestasi_id.*'=> ['required', 'exists:kriteria_prestasi,id'],
            'nilai_prestasi'        => ['required', 'array'],
            'nilai_prestasi.*'      => ['required', 'numeric'],
        ]);

        foreach ($valiadatedData['kriteria_prestasi_id'] as $index => $kriteriaId) {
            $kriteria   = KriteriaPrestasi::find($kriteriaId);
            $nilaiAsli  = $valiadatedData['nilai_prestasi'][$index];

            // Konversi nilai
            $nilaiKonversi = $this->rantingKecocokan($kriteria->nama_kriteria_prestasi, $nilaiAsli);

            NilaiPrestasi::create([
                'siswa_id'              => $valiadatedData['siswa_id'],
                'kriteria_prestasi_id'  => $kriteriaId,
                'nilai_prestasi'        => $nilaiKonversi,
            ]);
        }

        return redirect()->route('admin.perhitungan_jalur_prestasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiPrestasi  $nilaiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiPrestasi $nilaiPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiPrestasi  $nilaiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiPrestasi $nilaiPrestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiPrestasi  $nilaiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiPrestasi $nilaiPrestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiPrestasi  $nilaiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiPrestasi $nilaiPrestasi)
    {
        //
    }
    
    private function rantingKecocokan($kriteriaNama, $nilaiAsli)
    {
        if ($kriteriaNama === 'Matematika') {
            if ($nilaiAsli <= 60) return 2;
            elseif ($nilaiAsli <= 75) return 3;
            elseif ($nilaiAsli <= 85) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Bahasa Indonesia') {
            if ($nilaiAsli <= 70) return 2;
            elseif ($nilaiAsli <= 80) return 3;
            elseif ($nilaiAsli <= 90) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Ilmu Pengetahuan Alam') {
            if ($nilaiAsli <= 65) return 2;
            elseif ($nilaiAsli <= 75) return 3;
            elseif ($nilaiAsli <= 85) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Ilmu Pengetahuan Sosial') {
            if ($nilaiAsli <= 70) return 2;
            elseif ($nilaiAsli <= 85) return 3;
            elseif ($nilaiAsli <= 90) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Pendidikan Agama Islam') {
            if ($nilaiAsli <= 70) return 2;
            elseif ($nilaiAsli <= 85) return 3;
            elseif ($nilaiAsli <= 90) return 4;
            else return 5;
        }

        if ($kriteriaNama === 'Pendidikan Kewarnegaraan') {
            if ($nilaiAsli <= 70) return 2;
            elseif ($nilaiAsli <= 85) return 3;
            elseif ($nilaiAsli <= 90) return 4;
            else return 5;
        }

        return $nilaiAsli;
    }
}
