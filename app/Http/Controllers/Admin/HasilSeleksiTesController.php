<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiTes;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HasilSeleksiTesController extends Controller
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

        return view('admin.hasil_seleksi_tes.create', [
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
            'siswa_id'          => ['required', 'exists:siswa,id'],
            'nilai_akhir_tes'   => ['required', 'numeric'],
            'status_prestasi'   => ['required'],
        ]);

        HasilSeleksiTes::create($validatedData);

        return redirect()->route('admin.hasil_seleksi_tes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function show(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }
}
