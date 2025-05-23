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
    public function create()
    {
        $siswas             = Siswa::latest()->get();
        $kriteriaPrestasi   = KriteriaPrestasi::latest()->get();

        return view('admin.nilai_prestasi.create', [
            'siswas' => $siswas,
            'kriteriaPrestasi' => $kriteriaPrestasi,
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
            'kriteria_prestasi_id'  => ['required', 'exists:kriteria_prestasi,id'],
            'nilai_prestasi'        => ['required'],
        ]);

        NilaiPrestasi::create($valiadatedData);

        return redirect()->route('admin.nilai_prestasi.create');
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
}
