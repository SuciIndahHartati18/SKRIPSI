<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaPrestasi;
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
    public function create()
    {
        $siswas             = Siswa::latest()->get();
        $kriteriaPrestasi   = KriteriaPrestasi::latest()->get();

        return view('admin.normalisasi_prestasi.create', [
            'siswas'            => $siswas,
            'kriteriaPrestasi'  => $kriteriaPrestasi,
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
            'nilai_normalisasi_prestasi'    => ['required', 'numeric'],
            'kriteria_prestasi_id'          => ['nullable', 'array'],
            'kriteria_prestasi_id.*'        => ['exists:kriteria_prestasi,id'],
        ]);

        $validatedData['nilai_normalisasi_prestasi'] = number_format((float) $validatedData['nilai_normalisasi_prestasi'], 2, '.', ',');
        
        DB::transaction(function () use ($validatedData) {
            $normalisasi = NormalisasiPrestasi::create([
                'siswa_id'                      => $validatedData['siswa_id'],
                'nilai_normalisasi_prestasi'    => $validatedData['nilai_normalisasi_prestasi'],
            ]);

            $normalisasi->kriteriaPrestasi()->attach($validatedData['kriteria_prestasi_id']);
        });

        return redirect()->route('admin.normalisasi_prestasi.create');
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
