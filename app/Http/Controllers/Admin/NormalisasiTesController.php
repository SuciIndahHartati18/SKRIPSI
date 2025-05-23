<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaTes;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas     = Siswa::latest()->get();
        $kriteriaTes= KriteriaTes::latest()->get();

        return view('admin.normalisasi_tes.create',[
            'siswas'        => $siswas,
            'kriteriaTes'   => $kriteriaTes,
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
            'siswa_id'              => ['required', 'exists:siswa,id'],
            'nilai_normalisasi_tes' => ['required', 'numeric'],
            'kriteria_tes_id'       => ['nullable', 'array'],
            'kriteria_tes_id.*'     => ['exists:kriteria_tes,id'],
        ]);

        $validatedData['nilai_normalisasi_tes'] = number_format((float) $validatedData['nilai_normalisasi_tes'], 2, '.', '');

        DB::transaction(function () use ($validatedData) {
            $normalisasi = NormalisasiTes::create([
                'siswa_id'              => $validatedData['siswa_id'],
                'nilai_normalisasi_tes' => $validatedData['nilai_normalisasi_tes'],
            ]);

            $normalisasi->kriteriaTes()->attach($validatedData['kriteria_tes_id']);
        });

        return redirect()->route('admin.normalisasi_tes.create');
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
