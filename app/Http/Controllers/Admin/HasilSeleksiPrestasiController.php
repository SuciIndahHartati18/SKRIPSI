<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiPrestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HasilSeleksiPrestasiController extends Controller
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
        $siswas = Siswa::latest()->get();

        return view('admin.hasil_seleksi_prestasi.create', [
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
            'siswa_id'              => ['required', 'exists:siswa,id'],
            'nilai_akhir_prestasi'  => ['required', 'numeric'],
            'status_prestasi'       => ['required'],
        ]);
    
        // Convert to proper decimal format
        $validatedData['nilai_akhir_prestasi'] = number_format((float) $validatedData['nilai_akhir_prestasi'], 2, '.', '');

        HasilSeleksiPrestasi::create($validatedData);

        return redirect()->route('admin.hasil_seleksi_prestasi.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }
}
