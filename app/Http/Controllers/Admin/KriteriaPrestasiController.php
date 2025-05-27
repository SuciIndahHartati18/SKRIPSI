<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaPrestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KriteriaPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteriaPrestasi = KriteriaPrestasi::latest()->simplePaginate(6);

        return view('admin.kriteria_prestasi.index', [
            'kriteriaPrestasi' => $kriteriaPrestasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas = Siswa::latest()->get();

        return view('admin.kriteria_prestasi.create', [
            'siswas' => $siswas,
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
            'nama_kriteria_prestasi'    => ['required'],
            'tipe_kriteria_prestasi'    => ['required'],
            'bobot_kriteria_prestasi'   => ['required', 'numeric'],
        ]);

        $validatedData['bobot_kriteria_prestasi'] = number_format((float) $validatedData['bobot_kriteria_prestasi'], 2, '.', ',');

        KriteriaPrestasi::create($validatedData);

        return redirect()->route('admin.kriteria_prestasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KriteriaPrestasi  $kriteriaPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(KriteriaPrestasi $kriteriaPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KriteriaPrestasi  $kriteriaPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(KriteriaPrestasi $kriteriaPrestasi)
    {
        return view('admin.kriteria_prestasi.edit', [
            'kriteriaPrestasi' => $kriteriaPrestasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KriteriaPrestasi  $kriteriaPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaPrestasi $kriteriaPrestasi)
    {
        $validatedData = $request->validate([
            'nama_kriteria_prestasi'    => ['required'],
            'tipe_kriteria_prestasi'    => ['required'],
            'bobot_kriteria_prestasi'   => ['required', 'numeric'],
        ]);

        $validatedData['bobot_kriteria_prestasi'] = number_format((float) $validatedData['bobot_kriteria_prestasi'], 2, '.', ',');

        $kriteriaPrestasi->update($validatedData);

        return redirect()->route('admin.kriteria_prestasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KriteriaPrestasi  $kriteriaPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaPrestasi $kriteriaPrestasi)
    {
        $kriteriaPrestasi->delete();

        return redirect()->route('admin.kriteria_prestasi.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $kriteriaPrestasi = KriteriaPrestasi::when($search, function ($query, $search) {
                return $query->where('nama_kriteria_prestasi', 'like', '%' . $search . '%');
        })->simplePaginate(6);

        return view('admin.kriteria_prestasi.index', [
            'kriteriaPrestasi' => $kriteriaPrestasi,
        ]);
    }
}
