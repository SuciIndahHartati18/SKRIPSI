<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaTes;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KriteriaTesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteriaTes = KriteriaTes::latest()->simplePaginate(6);

        return view('admin.kriteria_tes.index', [
            'kriteriaTes' => $kriteriaTes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kriteria_tes.create');
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
            'nama_kriteria_tes'     => ['required'],
            'tipe_kriteria_tes'     => ['required'],
            'bobot_kriteria_tes'    => ['required'],
        ]);

        $validatedData['bobot_kriteria_tes'] = number_format((float) $validatedData['bobot_kriteria_tes'], 2, '.', ',');

        KriteriaTes::create($validatedData);

        return redirect()->route('admin.kriteria_tes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KriteriaTes  $kriteriaTes
     * @return \Illuminate\Http\Response
     */
    public function show(KriteriaTes $kriteriaTes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KriteriaTes  $kriteriaTes
     * @return \Illuminate\Http\Response
     */
    public function edit(KriteriaTes $kriteriaTes)
    {
        return view('admin.kriteria_tes.edit', [
            'kriteriaTes' => $kriteriaTes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KriteriaTes  $kriteriaTes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaTes $kriteriaTes)
    {
        $validatedData = $request->validate([
            'nama_kriteria_tes'     => ['required'],
            'tipe_kriteria_tes'     => ['required'],
            'bobot_kriteria_tes'    => ['required'],
        ]);

        $validatedData['bobot_kriteria_tes'] = number_format((float) $validatedData['bobot_kriteria_tes'], 2, '.', ',');

        $kriteriaTes->update($validatedData);

        return redirect()->route('admin.kriteria_tes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KriteriaTes  $kriteriaTes
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaTes $kriteriaTes)
    {
        $kriteriaTes->delete();

        return redirect()->route('admin.kriteria_tes.index');
    }
}
