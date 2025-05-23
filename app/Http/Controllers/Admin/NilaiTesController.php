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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas     = Siswa::latest()->get();
        $kriteriaTes= KriteriaTes::latest()->get();

        return view('admin.nilai_tes.create', [
            'siswas'        => $siswas,
            'kriteriaTes'   => $kriteriaTes
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
            'kriteria_tes_id'   => ['required', 'exists:kriteria_tes,id'],
            'nilai_tes'         => ['required'],
        ]);

        NilaiTes::create($validatedData);

        return redirect()->route('admin.nilai_tes.create');
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
}
